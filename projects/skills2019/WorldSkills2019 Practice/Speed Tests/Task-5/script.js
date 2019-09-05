const canvas = document.getElementsByTagName("canvas")[0];
const ctx = canvas.getContext("2d");

let x = [], xM = [],
    y = [], yM = [],
    dragging = [], draggingM = [],
    size = [], sizeM = [],
    color = [], colorM = [],
    erase = [], eraseM = [];
let recording = false;
let curColor = "rgb(127,127,127)";
let curLineWidth = 5;
let isErase = false;
let isRainbow = false;
let isMirror = false;

onLoad = () => {
    eventListeners();
    window.requestAnimationFrame(render);
}
render = () => {
    ctx.clearRect(0,0,500,500);
    ctx.lineJoin = "round";

    for (let i = 0; i < x.length; i++) {
        // Draws standard points
        ctx.strokeStyle = color[i];
        if (erase[i])
            ctx.strokeStyle = "white";
        ctx.lineWidth = size[i];
        ctx.beginPath();
        if (dragging[i] && i) {
            ctx.moveTo(x[i-1], y[i-1]);
        } else {
            ctx.moveTo(x[i] - 1, y[i]);
        }
        ctx.lineTo(x[i], y[i]);
        ctx.closePath();
        ctx.stroke();

        // Draws the mirrored points
        if (xM[i] !== -1 || yM[i] !== -1) {
            ctx.strokeStyle = colorM[i];
            if (eraseM[i])
                ctx.strokeStyle = "white";
            ctx.lineWidth = sizeM[i];
            ctx.beginPath();
            if (draggingM[i] && i) {
                ctx.moveTo(xM[i-1], yM[i-1]);
            } else {
                ctx.moveTo(xM[i] - 1, yM[i]);
            }
            ctx.lineTo(xM[i], yM[i]);
            ctx.closePath();
            ctx.stroke();
        }
    }

    // Display Mirror Line
    if (isMirror) {
        ctx.setLineDash([5, 3]);
        ctx.strokeStyle = "black";
        ctx.lineWidth = 1;
        ctx.beginPath();
        ctx.moveTo(250, 0);
        ctx.lineTo(250, 500);
        ctx.stroke();
        ctx.setLineDash([]);
    }

    window.requestAnimationFrame(render);
}

registerMouse = (xx, yy, ddragging = false) => {
    let randColor = "#" + parseInt(Math.random() * 16777215).toString(16);
    x.push(xx);
    y.push(yy);
    dragging.push(ddragging);
    if (!isRainbow)
        color.push(curColor);
    else
        color.push(randColor);
    size.push(curLineWidth);
    erase.push(isErase);

    if (isMirror) {
        xM.push(500 - xx);
        yM.push(yy);
        draggingM.push(ddragging);
        if (!isRainbow)
            colorM.push(curColor);
        else
            colorM.push(randColor);
        sizeM.push(curLineWidth);
        eraseM.push(isErase);
    } else {
        xM.push(-1);
        yM.push(-1);
        draggingM.push(-1);
        colorM.push(-1);
        sizeM.push(-1);
        eraseM.push(-1);
    }
}

eventListeners = () => {
    canvas.addEventListener("mousedown", (e) => {
        recording = true;
        registerMouse(getMousePos(e).x, getMousePos(e).y);
    });
    canvas.addEventListener("mousemove", (e) => {
        if (recording)
            registerMouse(getMousePos(e).x, getMousePos(e).y, true);
    });
    canvas.addEventListener("mouseup", () => {
        recording = false;
    });
    canvas.addEventListener("mouseleave", () => {
        recording = false;
    });
}
getMousePos = (e) => {
    const rect = canvas.getBoundingClientRect();
    return {
        x: e.clientX - rect.left,
        y: e.clientY - rect.top
    };
}
handleRGBChange = () => {
    const red = document.getElementById("red").value;
    const green = document.getElementById("green").value;
    const blue = document.getElementById("blue").value;
    curColor = "rgb(" + red + ", " + green + ", " + blue + ")";
    document.getElementsByClassName("RGBtext")[0].innerHTML = curColor;
}
handleLineWidthChange = () => {
    curLineWidth = document.getElementById("lineWidth").value;
    document.getElementsByClassName("lineWidthText")[0].innerHTML = "Line Width: " + curLineWidth;
}
handleEraseChange = () => {
    isErase = document.getElementById("eraseMode").checked;
}
handleRainbowChange = () => {
    isRainbow = document.getElementById("rainbowMode").checked;
}
handleMirrorChange = () => {
    isMirror = document.getElementById("mirrorMode").checked;
}

onLoad();