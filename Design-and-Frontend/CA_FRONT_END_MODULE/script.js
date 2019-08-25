const editor = document.getElementById("editor");
const editorCanvas = document.getElementById("editorCanvas");
const viewer = document.getElementById("viewer");
const ctx = editorCanvas.getContext("2d");
const wysiwygWrapper = document.getElementById("wysiwyg-wrapper");
const wysiwyg = document.getElementById("wysiwyg");
const newNodeButton = document.getElementById("newNodeButton");
const switchViewButton = document.getElementById("switchViewButton");

const topCon = document.getElementById("topConnection");
const rightCon = document.getElementById("rightConnection");
const botCon = document.getElementById("bottomConnection");
const leftCon = document.getElementById("leftConnection");

let controller;
let isEdit = true;
let currentlyViewing = -1;

// TODO Froala editor not rendering full editor
// TODO fix scroll bars
// TODO animate slide transitions based on direction

onLoad = () => {
    fullCanvas();
    window.onresize = fullCanvas;

    $('#wysiwyg').froalaEditor();

    controller = new CanvasController(editorCanvas.width / 2, editorCanvas.height / 2);
    controller.start();
    setInterval(() => {
        controller.saveToStorage();
    }, 100);
};

switchView = () => {
    isEdit = !isEdit;
    if (isEdit) {
        switchViewButton.innerHTML = "Presentation Mode";
        viewer.innerHTML = "";

        editor.classList.add("fadeIn");
        editor.classList.remove("fadeOut");
        viewer.classList.remove("fadeIn");
        viewer.classList.add("fadeOut");

        console.log(currentlyViewing);
        editNode(currentlyViewing, true);
    } else {
        switchViewButton.innerHTML = "Edit Mode";
        editor.classList.remove("fadeIn");
        editor.classList.add("fadeOut");
        viewer.classList.add("fadeIn");
        viewer.classList.remove("fadeOut");

        // Generate HTML for slides
        for (let a = 0; a < controller.presentation.items.length; a++) {
            const node = controller.presentation.items[a];
            if (!(node instanceof Deleted)) {
                let newHTML = "";
                newHTML += "<div class='slide' id='slide" + a + "'>";
                for (let z = 0; z < 4; z++)
                    if (node.connections[z] !== null) {
                        newHTML += "<div class='connectLink connectLink" + z + "' onclick='showSlide(" + node.connections[z] + ", true," + z + ")'>"
                            + controller.presentation.items[node.connections[z]].title
                            + "</div>";
                    }
                newHTML += "<div class='slideContent'>" + controller.presentation.items[a].content + "</div>";
                newHTML += "</div>";
                viewer.innerHTML += newHTML;
            }
        }
        if (document.getElementById("hidden-ID").value != -1)
            showSlide(document.getElementById("hidden-ID").value);
        else
            showSlide(controller.startingNode);
    }
};

showSlide = (id, slideIn = false, location = -1) => {
    currentlyViewing = parseInt(id);
    const slides = document.getElementsByClassName("slide");
    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.add("hidden");
        slides[i].classList.remove("slideInLeft");
        slides[i].classList.remove("slideInRight");
        slides[i].classList.remove("slideInTop");
        slides[i].classList.remove("slideInBottom");
    }
    document.getElementById("slide" + id).classList.remove("hidden");
    if (slideIn) {
        document.getElementById("slide" + id).classList.add("slideIn" + location);
    }
};

setStarting = () => {
    controller.startingNode = document.getElementById("hidden-ID").value;
    controller.saveToStorage();
};

newBlankNode = () => {
    controller.addNode(new Node("", "", [null, null, null, null],
        -controller.state.panX + editorCanvas.width / 2 - 60,
        -controller.state.panY + editorCanvas.height / 2 - 20,
        controller))
};

showEdit = (e, doCanvas = true) => {
    wysiwygWrapper.classList.add("fadeIn");
    wysiwygWrapper.classList.remove("fadeOut");
    if (doCanvas) {
        editorCanvas.classList.remove("fadeIn");
        newNodeButton.classList.remove("fadeIn");
        editorCanvas.classList.add("fadeOut");
        newNodeButton.classList.add("fadeOut");
    } else {
        viewer.classList.remove("fadeIn");
        viewer.classList.add("fadeOut");
    }

    const title = document.getElementById("titleEditor");
    const id = document.getElementById("hidden-ID");
    id.value = e.thisID;
    title.value = e.title;

    $('#wysiwyg').froalaEditor('html.set', e.content);

    // Make this the focus of editing in the canvas
    controller.presentation.items.forEach((e) => {
        e.editMode = false;
        e.trueEdit = false;
    });
    e.editMode = true;
    e.trueEdit = true;

    // Connections
    if (e.connections[0] !== null) {
        topCon.innerHTML = "<p>" + controller.presentation.items[e.connections[0]].title + "</p>"
            + "<button class=\"connectorButton\" onclick='editNode(" + e.connections[0] + ")'>Edit</button>"
            + "<button class=\"connectorButton\"onclick='deleteConnection(0)'>Delete</button>";
    } else {
        topCon.innerHTML = "<button class=\"connectorButton\" onclick='newNode(0," + e.thisID + ")'>Create New Node</button>";
    }
    if (e.connections[1] !== null) {
        rightCon.innerHTML = "<p>" + controller.presentation.items[e.connections[1]].title + "</p>"
            + "<button class=\"connectorButton\" onclick='editNode(" + e.connections[1] + ")'>Edit</button>"
            + "<button class=\"connectorButton\" onclick='deleteConnection(1)'>Delete</button>";
    } else {
        rightCon.innerHTML = "<button class=\"connectorButton\" onclick='newNode(1," + e.thisID + ")'>Create New Node</button>";
    }
    if (e.connections[2] !== null) {
        botCon.innerHTML = "<p>" + controller.presentation.items[e.connections[2]].title + "</p>"
            + "<button class=\"connectorButton\" onclick='editNode(" + e.connections[2] + ")'>Edit</button>"
            + "<button class=\"connectorButton\" onclick='deleteConnection(2)'>Delete</button>";
    } else {
        botCon.innerHTML = "<button class=\"connectorButton\" onclick='newNode(2," + e.thisID + ")'>Create New Node</button>";
    }
    if (e.connections[3] !== null) {
        leftCon.innerHTML = "<p>" + controller.presentation.items[e.connections[3]].title + "</p>"
            + "<button class=\"connectorButton\" onclick='editNode(" + e.connections[3] + ")'>Edit</button>"
            + "<button class=\"connectorButton\" onclick='deleteConnection(3)'>Delete</button>";
    } else {
        leftCon.innerHTML = "<button class=\"connectorButton\" onclick='newNode(3," + e.thisID + ")'>Create New Node</button>";
    }

};

editNode = (id, doCanvas = true) => {
    const e = controller.presentation.items[id];
    showEdit(e, doCanvas);
};

newNode = (i, id) => {
    let nextID = controller.presentation.items.length;
    const e = controller.presentation.items[id];
    if (i == 0) { // Create Top
        controller.addNode(new Node("", "", [null, null, id, null], e.x, e.y - 200, controller));
    } else if (i == 1) { // Create Right
        controller.addNode(new Node("", "", [null, null, null, id], e.x + 200, e.y, controller));
    } else if (i == 2) { // Create Bottom
        controller.addNode(new Node("", "", [id, null, null, null], e.x, e.y + 200, controller));
    } else if (i == 3) { // Create Left
        controller.addNode(new Node("", "", [null, id, null, null], e.x - 200, e.y, controller));
    }
    e.connections[i] = nextID;
    editNode(id);
};

saveEditor = () => {
    const id = document.getElementById("hidden-ID").value;
    const title = document.getElementById("titleEditor");
    const e = controller.presentation.items[parseInt(id)];
    e.title = title.value;
    e.content = $('#wysiwyg').froalaEditor('html.get');
    controller.saveToStorage();
    editNode(id);
};

closeEdit = () => {
    editorCanvas.classList.add("fadeIn");
    wysiwygWrapper.classList.remove("fadeIn");
    newNodeButton.classList.add("fadeIn");
    editorCanvas.classList.remove("fadeOut");
    wysiwygWrapper.classList.add("fadeOut");
    newNodeButton.classList.remove("fadeOut");

    const title = document.getElementById("titleEditor");
    const id = document.getElementById("hidden-ID");
    id.value = "-1";
    title.value = "";

    $('#wysiwyg').froalaEditor('html.set', "");
};

deleteEdit = () => {
    const id = document.getElementById("hidden-ID").value;
    const node = controller.presentation.items[id];
    for (let a = 0; a < 4; a++) {
        // Remove connections from connected nodes
        if (node.connections[a] !== null) {
            const remoteConnections = controller.presentation.items[node.connections[a]].connections;
            for (let b = 0; b < 4; b++) {
                if (remoteConnections[b] == id) {
                    remoteConnections[b] = null;
                }
            }
        }
    }
    // Remove this object from the presentation
    controller.removeNode(id);
    closeEdit();
};

deleteConnection = (location, targetID = -1) => {
    let id = targetID;
    if (targetID == -1)
        id = document.getElementById("hidden-ID").value;
    const node = controller.presentation.items[id];
    console.log(node);
    const target = controller.presentation.items[node.connections[location]];
    for (let a = 0; a < 4; a++) {
        if (target.thisID == node.thisID && a == location)
            continue;
        if (target.connections[a] == id) {
            target.connections[a] = null;
            break;
        }
    }
    node.connections[location] = null;
    editNode(id);
};


fullCanvas = () => {
    editorCanvas.height = editor.offsetHeight;
    editorCanvas.width = editor.offsetWidth;
    editorCanvas.tabIndex = 0;
    editorCanvas.focus();
};

class CanvasController {
    constructor(xOffset, yOffset) {
        this.state = {};
        this.presentation = {};
        this.resetData();
        this.xOffset = xOffset;
        this.yOffset = yOffset;
        this.startingNode = 0;
    }

    resetData = () => {
        this.presentation = {
            items: []
        };
        this.toRemove = [];
        this.state = {
            mouseDown: false,
            mouseUp: false,
            shift: false,
            delete: false,
            panX: this.xOffset - 60,
            panY: this.yOffset - 40,
            mouseX: 0,
            mouseY: 0,
            startDragX: 0,
            startDragY: 0,
            isDragging: false,
            initialClick: true
        };
        this.dragging = {
            edgeButton: null,
            edgeNode: null,
            nodeOffsetX: 0,
            nodeOffsetY: 0,
            node: null
        };
    };

    addNode = (node) => {
        this.presentation.items.push(node);
    };

    removeNode = (index) => {
        this.toRemove.push(index);
    };

    getPannedPosition = (e) => {
        return [e.x + this.state.panX, e.y + this.state.panY];
    };

    render = () => {
        ctx.clearRect(0, 0, editorCanvas.width, editorCanvas.height);

        this.presentation.items.forEach((e) => {
            e.render();
        });

        if (this.dragging.edgeButton !== null) {
            ctx.beginPath();
            ctx.moveTo(
                getEdgePoint(this.dragging.edgeNode, this.dragging.edgeButton.location)[0],
                getEdgePoint(this.dragging.edgeNode, this.dragging.edgeButton.location)[1]
            );
            ctx.lineTo(
                this.state.mouseX, this.state.mouseY
            );
            ctx.strokeStyle = "black";
            ctx.stroke();
        }
    };

    loop = () => {
        let nextID = this.presentation.items.length;

        // Remove things from last run
        for (let i = 0; i < this.toRemove.length; i++) {
            this.presentation.items[this.toRemove[i]] = new Deleted();
        }
        this.toRemove = [];

        if (this.state.shift && this.state.mouseDown) {
            this.dragging.edgeButton = null;
            this.dragging.edgeNode = null;
            this.state.isDragging = true;
            this.state.startDragX = this.state.mouseX;
            this.state.startDragY = this.state.mouseY;
        }
        if(!this.state.shift || this.state.mouseUp) {
            this.state.isDragging = false;
        }
        if (this.state.dblclick) {
            this.state.dblclick = false;
            const clickObj = {
                x: this.state.mouseX - this.state.panX,
                y: this.state.mouseY - this.state.panY,
                width: 2, height: 2
            };
            this.presentation.items.forEach((e) => {
                e.editMode = false;
                e.trueEdit = false;
            });
            const item = getColliding(clickObj, this.presentation.items);
            if (item.length >= 1) {
                item[0].editMode = true;
                item[0].trueEdit = true;
            }
        }
        if (this.state.mouseDown && this.state.initialClick) {
            this.state.initialClick = false;
            const clickObj = {
                x: this.state.mouseX - this.state.panX,
                y: this.state.mouseY - this.state.panY,
                width: 2, height: 2
            };

            // Edit Button Click Handler
            let overEdit = false;
            for (let i = 0; i < this.presentation.items.length; i++) {
                const e = this.presentation.items[i];
                const items = getColliding(clickObj, [e.editCollider]);
                if (items.length >= 1) {
                    overEdit = true;
                    this.state.mouseDown = false;
                }
            }

            if (!overEdit) {
                if (this.dragging.edgeButton === null) {
                    for (let id = 0; id < this.presentation.items.length; id++) {
                        const e = this.presentation.items[id];
                        const items = getColliding(clickObj, e.createEdgeButtonsColliders);
                        if (items.length >= 1) {
                            this.dragging.edgeButton = items[0];
                            this.dragging.edgeNode = e;
                            break;
                        }
                    }
                }
                if (this.dragging.node === null && this.dragging.edgeButton === null) {
                    const nodes = getColliding(clickObj, this.presentation.items);
                    if (nodes.length >= 1) {
                        this.dragging.node = nodes[nodes.length - 1];
                        this.dragging.nodeOffsetX = nodes[nodes.length - 1].x - clickObj.x;
                        this.dragging.nodeOffsetY = nodes[nodes.length - 1].y - clickObj.y;
                    }
                }
            }
        }
        if (!this.state.mouseDown || this.state.mouseUp)
            this.state.initialClick = true;
        if (this.state.mouseUp) {
            const clickObj = {
                x: this.state.mouseX - this.state.panX,
                y: this.state.mouseY - this.state.panY,
                width: 2, height: 2
            };

            // Edit Button Click Handler
            for (let i = 0; i < this.presentation.items.length; i++) {
                const e = this.presentation.items[i];
                const items = getColliding(clickObj, [e.editCollider]);
                if (items.length >= 1) {
                    showEdit(e);
                }
            }

            // Dragging Node and Edges
            this.state.mouseUp = false;
            this.state.mouseDown = false;
            if (this.dragging.edgeButton !== null) {
                for (let id = 0; id < this.presentation.items.length; id++) {
                    const e = this.presentation.items[id];
                    const items = getColliding(clickObj, e.createEdgeButtonsColliders);
                    if (items.length >= 1) {
                        let droppedEdgeButton = items[0];

                        // For single click
                        if (e === this.dragging.edgeNode && droppedEdgeButton.location == this.dragging.edgeButton.location) {
                            let i = this.dragging.edgeButton.location;
                            if (i == 0) { // Create Top
                                this.addNode(new Node("", "", [null, null, id, null], e.x, e.y - 200, this));
                            } else if (i == 1) { // Create Right
                                this.addNode(new Node("", "", [null, null, null, id], e.x + 200, e.y, this));
                            } else if (i == 2) { // Create Bottom
                                this.addNode(new Node("", "", [id, null, null, null], e.x, e.y + 200, this));
                            } else if (i == 3) { // Create Left
                                this.addNode(new Node("", "", [null, id, null, null], e.x - 200, e.y, this));
                            }
                            e.connections[i] = nextID;
                        } else {
                            // For dragging new connection
                            e.connections[droppedEdgeButton.location] = this.dragging.edgeNode.thisID;
                            this.dragging.edgeNode.connections[this.dragging.edgeButton.location] = e.thisID;
                        }
                        break;
                    }
                }

                for (let i = 0; i < this.presentation.items.length; i++)
                    if (this.presentation.items[i] != "Deleted" || this.presentation.items[i] instanceof Deleted)
                        this.presentation.items[i].editMode = false;
            }
            this.dragging.node = null;
            this.dragging.edgeButton = null;
            this.dragging.edgeNode = null;
        }
        if (this.state.delete) {
            this.state.delete = false;
            for (let i = 0; i < this.presentation.items.length; i++) {
                const node = this.presentation.items[i];
                if (node.editMode) {
                    for (let a = 0; a < 4; a++) {
                        // Remove connections from connected nodes
                        if (node.connections[a] !== null) {
                            const remoteConnections = this.presentation.items[node.connections[a]].connections;
                            for (let b = 0; b < 4; b++) {
                                if (remoteConnections[b] == i) {
                                    remoteConnections[b] = null;
                                }
                            }
                        }
                    }
                    // Remove this object from the presentation
                    this.removeNode(i);
                    node.connections = [null,null,null,null];
                    break;
                }
            }
        }

        if (this.dragging.node !== null) {
            this.dragging.node.x = this.state.mouseX - this.state.panX + this.dragging.nodeOffsetX;
            this.dragging.node.y = this.state.mouseY - this.state.panY + this.dragging.nodeOffsetY;
        }
        if (this.dragging.edgeButton !== null) {
            for (let i = 0; i < this.presentation.items.length; i++) {
                if (this.presentation.items[i] != "Deleted" || this.presentation.items[i] instanceof Deleted)
                    this.presentation.items[i].editMode = true;
            }
        }

        this.render();
        window.requestAnimationFrame(this.loop);
    };

    createListeners = () => {
        editorCanvas.addEventListener('keyup', (e) => {
            if (e.key === "Shift")
                this.state.shift = false;
            if (e.key === "Delete")
                this.state.delete = true;
        });
        editorCanvas.addEventListener('keydown', (e) => {
            if (e.key === "Shift")
                this.state.shift = true;
            if (e.key === "Delete")
                this.state.delete = true;
        });
        editorCanvas.addEventListener('mousedown', (e) => {
            this.state.mouseDown = true;
        });
        editorCanvas.addEventListener('mouseup', (e) => {
            this.state.mouseUp = true;
        });
        editorCanvas.addEventListener('mouseout', () => {
            this.state.mouseDown = false;
            this.state.mouseUp = false;
            this.state.isDragging = false;
        });
        editorCanvas.addEventListener('mousemove', (e) => {
            let rect = editorCanvas.getBoundingClientRect();
            this.state.mouseX = e.clientX - rect.left;
            this.state.mouseY = e.clientY - rect.top;

            if (this.state.isDragging) {
                this.state.panX += this.state.mouseX - this.state.startDragX;
                this.state.panY += this.state.mouseY - this.state.startDragY;
                this.state.startDragX = this.state.mouseX;
                this.state.startDragY = this.state.mouseY;
            }
        });
        editorCanvas.addEventListener('dblclick', (e) => {
            this.state.dblclick = true;
        });
    };

    start = () => {
        this.createListeners();
        this.reloadData();
        this.reloadData();
        window.requestAnimationFrame(this.loop);
    };

    resetStorage = () => {
        localStorage.clear();
        location.reload();
    }

    reloadData = () => {
        this.resetData();
        this.loadFromStorage();
    };

    saveToStorage = () => {
        const itemsList = [];
        for (let i = 0; i < this.presentation.items.length; i++) {
            if (!(this.presentation.items[i] instanceof Deleted))
                itemsList.push({
                    content: this.presentation.items[i].content,
                    title: this.presentation.items[i].title,
                    connections: this.presentation.items[i].connections,
                    canvasPosition: {
                        x: this.presentation.items[i].x,
                        y: this.presentation.items[i].y
                    }
                });
            else {
                itemsList.push("Deleted");
            }
        }
        localStorage.setItem("presentation", JSON.stringify({
            items: itemsList,
            starting: this.startingNode
        }));
    };

    loadFromStorage = () => {
        if (localStorage.getItem("presentation") === null) {
            localStorage.setItem("presentation", JSON.stringify({
                items: [{
                    content: "",
                    title: "",
                    connections: [null, null, null, null],
                    canvasPosition: {
                        x: 0,
                        y: 0
                    }
                }],
                starting: 0
            }));
        } else {
            const localData = JSON.parse(localStorage.getItem("presentation"));
            localData.items.forEach((elem) => {
                if (elem != "Deleted")
                    this.addNode(new Node(elem.content, elem.title, elem.connections, elem.canvasPosition.x, elem.canvasPosition.y, this));
                else
                    this.addNode(new Deleted());
            });
            this.startingNode = localData.starting;
        }
    };
}

class Node {
    constructor(content, title, connections, x, y, parent) {
        this.width = 120;
        this.height = 80;

        this.content = content;
        this.title = title;
        this.connections = connections;
        this.x = x;
        this.y = y;
        this.parent = parent;
        this.editMode = false;
        this.trueEdit = false;
        this.createEdgeButtonsColliders = [];
        this.editCollider = {};

        this.thisID;
    }

    renderEditModeButton = (dimensions) => {
        ctx.strokeStyle = "lightgrey";
        ctx.strokeRect(
            this.parent.getPannedPosition(this)[0] + dimensions.x - this.x,
            this.parent.getPannedPosition(this)[1] + dimensions.y - this.y,
            dimensions.width,
            dimensions.height
        );

        ctx.beginPath();
        ctx.moveTo(
            this.parent.getPannedPosition(this)[0] + dimensions.x - this.x + 2,
            this.parent.getPannedPosition(this)[1] + dimensions.y - this.y + 6
        );
        ctx.lineTo(
            this.parent.getPannedPosition(this)[0] + dimensions.x - this.x + 12,
            this.parent.getPannedPosition(this)[1] + dimensions.y - this.y + 6
        );
        ctx.strokeStyle = "lightgrey";
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(
            this.parent.getPannedPosition(this)[0] + dimensions.x - this.x + 6,
            this.parent.getPannedPosition(this)[1] + dimensions.y - this.y + 2
        );
        ctx.lineTo(
            this.parent.getPannedPosition(this)[0] + dimensions.x - this.x + 6,
            this.parent.getPannedPosition(this)[1] + dimensions.y - this.y + 12
        );
        ctx.strokeStyle = "lightgrey";
        ctx.stroke();
    }

    render = () => {
        for (let i = 0; i < this.parent.presentation.items.length; i++) {
            if (this.parent.presentation.items[i] == this)
                this.thisID = i;
        }
        this.createEdgeButtonsColliders = [];

        // Draw Node
        ctx.strokeStyle = "black";
        ctx.fillStyle = "#F9F9F9";
        ctx.fillRect(
            this.parent.getPannedPosition(this)[0],
            this.parent.getPannedPosition(this)[1],
            this.width,
            this.height
        );
        ctx.strokeRect(
            this.parent.getPannedPosition(this)[0],
            this.parent.getPannedPosition(this)[1],
            this.width,
            this.height
        );

        // Draw Edit Mode Buttons
        if (this.editMode) {
            if (this.connections[0] === null) {
                this.createEdgeButtonsColliders[0] = {
                    x: this.x + this.width / 2 - 6,
                    y: this.y - 14 - 12,
                    width: 12,
                    height: 12,
                    location: 0
                };
                this.renderEditModeButton(this.createEdgeButtonsColliders[0]);
            }
            if (this.connections[1] === null) {
                this.createEdgeButtonsColliders[1] = {
                    x: this.x + this.width + 2,
                    y: this.y + this.height / 2 - 7,
                    width: 12,
                    height: 12,
                    location: 1
                };
                this.renderEditModeButton(this.createEdgeButtonsColliders[1]);
            }
            if (this.connections[2] === null) {
                this.createEdgeButtonsColliders[2] = {
                    x: this.x + this.width / 2 - 6,
                    y: this.y + this.height + 2,
                    width: 12,
                    height: 12,
                    location: 2
                };
                this.renderEditModeButton(this.createEdgeButtonsColliders[2]);
            }
            if (this.connections[3] === null) {
                this.createEdgeButtonsColliders[3] = {
                    x: this.x - 14,
                    y: this.y + this.height / 2 - 7,
                    width: 12,
                    height: 12,
                    location: 3
                };
                this.renderEditModeButton(this.createEdgeButtonsColliders[3]);
            }

            if (this.trueEdit) {
                this.editCollider = {
                    x: this.x + this.width / 2 - 32,
                    y: this.y + this.height / 2 - 12,
                    width: 64,
                    height: 24
                };
                ctx.strokeStyle = "black";
                ctx.strokeRect(
                    this.editCollider.x + this.parent.getPannedPosition(this)[0] - this.x,
                    this.editCollider.y + this.parent.getPannedPosition(this)[1] - this.y,
                    this.editCollider.width,
                    this.editCollider.height
                );
                ctx.font = "14px Helvetica";
                ctx.textAlign = "center";
                ctx.fillStyle = "black";
                ctx.fillText("Edit",
                    this.editCollider.x + this.parent.getPannedPosition(this)[0] - this.x + 32,
                    this.editCollider.y + this.parent.getPannedPosition(this)[1] - this.y + 17);
            }
        } else {
            this.editCollider = {
                x: this.x + this.width / 2 - 32,
                y: this.y + this.height / 2 - 12,
                width: 0,
                height: 0
            };
        }

        // Draw Edges
        for (let a = 0; a < 4; a++) {
            if (this.connections[a] !== null) {
                const target = this.parent.presentation.items[this.connections[a]];
                let targetLocation = -1;
                for (let i = 0; i < target.connections.length; i++) {
                    if (target.connections[i] === this.thisID)
                        targetLocation = i;
                }
                ctx.beginPath();
                ctx.moveTo(
                    getEdgePoint(this, a)[0],
                    getEdgePoint(this, a)[1]
                );
                ctx.lineTo(
                    getEdgePoint(target, targetLocation)[0],
                    getEdgePoint(target, targetLocation)[1]
                );
                ctx.strokeStyle = "black";
                ctx.stroke();
            }
        }

        // Draw Node ID
        ctx.fillStyle = "black";
        ctx.font = "12px Helvetica";
        ctx.textAlign = "left";
        if (this.title !== "")
            ctx.fillText(this.title + "", this.parent.getPannedPosition(this)[0], this.parent.getPannedPosition(this)[1] - 5);
        else {
            ctx.font = "italic 10px Helvetica";
            ctx.fillText("New Node (#" + this.thisID + ")", this.parent.getPannedPosition(this)[0], this.parent.getPannedPosition(this)[1] - 5);
        }

    }
}

class Deleted extends Node {
    constructor() {
        super("", [null, null, null, null], 0, 0, null);
        this.height = 0;
        this.width = 0;
    }

    render = () => {
    };
}

function getEdgePoint(target, targetLocation) {
    if (targetLocation == 0) {
        return [controller.getPannedPosition(target)[0] + target.width / 2, controller.getPannedPosition(target)[1]];
    } else if (targetLocation == 1) {
        return [controller.getPannedPosition(target)[0] + target.width, controller.getPannedPosition(target)[1] + target.height / 2];
    } else if (targetLocation == 2) {
        return [controller.getPannedPosition(target)[0] + target.width / 2, controller.getPannedPosition(target)[1] + target.height];
    } else if (targetLocation == 3) {
        return [controller.getPannedPosition(target)[0], controller.getPannedPosition(target)[1] + target.height / 2];
    }
}

function getColliding(obj, list) {
    let col = [];
    for (let i = 0; i < list.length; ++i) {
        if (list[i] === undefined || list[i] == null)
            continue;
        let tw = obj.width;
        let th = obj.height;
        let rw = list[i].width;
        let rh = list[i].height;
        if (!(rw <= 0 || rh <= 0 || tw <= 0 || th <= 0)) {
            const tx = obj.x;
            const ty = obj.y;
            const rx = list[i].x;
            const ry = list[i].y;
            rw += rx;
            rh += ry;
            tw += tx;
            th += ty;
            if ((rw < rx || rw > tx) && (rh < ry || rh > ty) && (tw < tx || tw > rx) && (th < ty || th > ry))
                if (list[i] != obj)
                    col.push(list[i]);
        }
    }
    return col;
}
