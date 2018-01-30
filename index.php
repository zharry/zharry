<?php

    require_once('/etc/mysql-creds/mysql-creds.php');
    require_once('index.defines.php');

    $conn = mysqli_connect($mysql_creds["host"], $mysql_creds["user"], $mysql_creds["pass"], "zharry");

    if (!$conn) {
        die("Error establishing database connection, please contact Harry if you see this message");
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="/src/modal.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500" rel="stylesheet">
        <link rel="stylesheet" href="/src/style.css">
        <link rel="shortcut icon" href="/favicon.ico" />
        
        <title>Harry Zhang</title>
    </head>
    <body>
        <div id="header">
            Harry Zhang
        </div>
        
        <div id="intro">
            <div id="hookTextContainer">
                <div id="hookText">
                <h4>I'm a </h4>
                <h2 class="typewrite" data-period="2000" data-type='[ "Student", "Programmer", "Developer" ]'>
                    <span class="wrap"></span>
                </h2>
                </div>
            </div>
        </div>        
        
        <div id="body">
            <div id="about" class="bodyElem">
                <h1 class="title bodyElemTitle">About Me</h1>
                <hr/>
                <p>My name is Harry Zhang and I'm a 17 year old high school student at Don Mills Collegiate Institute. 
                I have a passion for technology and an unending thirst for new and creative ideas. 
                Ever since grade 6, I have always yearned to learn more, do more and explore more of our digital world.</p>
                <hr/>
                <h2 class="title bodyElemSubTitle">Skills and Experience</h2>
                <p style="font-size: 14px">
                    <i>"Learn from yesterday, live for today, hope for tomorrow. The important thing is not to stop questioning."</i><br>
                    <i style="  float: right;
                                padding-right: 15px;">
                        - Albert Einstein
                    </i>
                    <div style="clear: both"></div>
                </p>
                <p style="  padding: 0;
                            text-indent: 0;
                            text-align: center;">
                    <img src="content/skills/Skill_HTML.png" class="skillIcon" title="HTML 5 Markup">
                    <img src="content/skills/Skill_CSS.png" class="skillIcon" title="CSS Language">
                    <img src="content/skills/Skill_JS.png" class="skillIcon" title="Javascript Programming Language">
                    <img src="content/skills/Skill_PHP.png" class="skillIcon" title="PHP Programming Language">
                    <img src="content/skills/Skill_MySQL.png" class="skillIcon" title="MySQL Database and SQL Language">
                    <img src="content/skills/Skill_Java.png" class="skillIcon" title="Java Programming Language">
                    <img src="content/skills/Skill_Unity.png" class="skillIcon" title="Unity3D Game Engine">
                    <img src="content/skills/Skill_Linux.png" class="skillIcon" title="Linux and Linux Server Operating Systems">
                </p>
            </div>
            
            <div id="competitions" class="bodyElem">
                <h1 class="title bodyElemTitle">Events and Competitions</h1>
                <img src="content/banner/Banner_Event.png" class="bodyElemBanner" title="Hack The North 2016, Skills Canada 2017, NASA Space Apps 2016">
                <p>
                    From Waterloo to Winnipeg, I've always enjoyed the thrill of going to new places, meeting new people and learning new things.
                </p>
                <div class="learnMoreContainer">
                    <a href class="learnMore" data-toggle="modal" data-target="#modal-events">Learn more</a>
                </div>
            </div>
            
            <div id="projects" class="bodyElem">
                <h1 class="title bodyElemTitle">Projects and Extracurriculars</h1>
                <img src="content/banner/Banner_Projects.png" class="bodyElemBanner" title="StudyHub, DMCI Robtoics">
                <p>
                    I rarely get the time to work on projects. But when I do, it's with a goal to develop new skills and improve our day to day lives.
                </p>
                <div class="learnMoreContainer">
                    <a href class="learnMore" data-toggle="modal" data-target="#modal-projects">Learn more</a>
                </div>
            </div>
            
            <div id="school" class="bodyElem">
                <h1 class="title bodyElemTitle">School</h1>
                <img src="content/banner/Banner_School.png" class="bodyElemBanner" title="Blog of the Flies (Grade 9 English Project), Tower Crane Presentation (Grade 9 Tech Summative), Scrabble Game (Grade 11 Assignment)">
                <p>
                    It's amazing, the things you can do with code. Something as plain as homework can be made to be so amazing, and done with such creativity. 
                    From Grade 7 to the present day, check out all of my school projects below!
                </p>
                <div class="learnMoreContainer">
                    <a href class="learnMore" data-toggle="modal" data-target="#modal-school-websites">Websites</a>
                    <a href class="learnMore" data-toggle="modal" data-target="#modal-school-games">Games</a>
                    <a href class="learnMore" data-toggle="modal" data-target="#modal-school-presentations">Presentations</a>
                </div>
            </div>
            
            <div id="others" class="bodyElem">
                <h1 class="title bodyElemTitle">Other Projects</h1>
                <img src="content/banner/Banner_Others.png" class="bodyElemBanner" title="Paragon Discord Bot, Platform Fantasy Game">
                <p>
                    Random projects, some discountinued, some ongoing, ranging from bots to games.
                </p>
                <div class="learnMoreContainer">
                    <a href class="learnMore" data-toggle="modal" data-target="#modal-others">Learn more</a>
                </div>           
            </div>
            
            <div id="social" class="footer">            
                <div id="others" class="footerContent">

                    <p style="  padding: 0;
                            text-indent: 0;
                            text-align: center;">
                        <a href="https://github.com/zharry"><img src="content/social/GitHub-Mark-120px-plus.png" class="socialIcon" title="GitHub"></a>
                        <a href="https://devpost.com/zharry"><img src="content/social/DevPost.png" class="socialIcon" title="Devpost"></a>
                        <a href="https://www.linkedin.com/in/zhharry/"><img src="content/social/LinkedIn-512.png" class="socialIcon" title="LinkedIn"></a>
                        <a href="mailto:zh.harry@yahoo.ca?subject=Hello!"><img src="content/social/email.png" class="socialIcon" title="Email"></a>
                        <a href="https://www.facebook.com/zh.harry"><img src="content/social/Facebook-512.png" class="socialIcon" title="Facebook"></a>
                    </p>
                </div>
            </div>
        </div>
        
        <!--Modals-->
            <!--Events-->
            <div class="modal fade" id="modal-events" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Events and Competitions</h5>
                            <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php
                                $query = "SELECT * FROM `projects` WHERE `type` = 0;";
                                $events = mysqli_query($conn, $query);
                            
                                if (mysqli_num_rows($events) > 0) {
                                    while($row = mysqli_fetch_assoc($events)) {
                            ?>
                            <div class="learnMore-row" id="project-<?=$row["id"]?>">
                                <div class="learnMore-left">
                                    <img class="learnMore-left-content" src="content/gallery/<?=$row["gallery"]?>">
                                    <?php
                                        $visit = json_decode($row["visit"], true);
                                        if (!is_null($visit)) {
                                            for ($i = 0; $i < sizeof($visit); $i++) {
                                    ?>
                                        <center><a href="<?=$visit[$i]["Link"]?>"><?=$visit[$i]["Desc"]?></a></center>
                                    <?
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="learnMore-right">
                                    <div class="learnMore-Title"><?=$row["name"]?></div>
                                    <div class="learnMore-content learnMore-desc">
                                        <p>
                                            <?=$row["description"]?>
                                        </p>
                                    </div>
                                    <div class="learnMore-content learnMore-tech">
                                        <h3 class="title">Made with:</h3>
                                        <?=$row["tech"]?>
                                    </div>
                                    <?php
                                        $collab = json_decode($row["collab"], true);
                                        if (!is_null($collab)) {
                                    ?>
                                    <div class="learnMore-content learnMore-collab">
                                        <h3 class="title">Collaborators:</h3>
                                        <?php
                                            $out = "";
                                            for ($i = 0; $i < sizeof($collab); $i++) {
                                                echo $people[$collab[$i]];
                                                if ($i < sizeof($collab) - 1) { echo ", "; }
                                            }
                                        ?>
                                    </div>
                                    <?php
                                        }
                                        
                                        $links = json_decode($row["links"], true);
                                        if (!is_null($links)) {
                                    ?>
                                    <div class="learnMore-content learnMore-links">
                                        <?php
                                            for ($i = 0; $i < sizeof($links); $i++) {
                                                echo '<a href="' . $links[$i]["Link"] . '">';
                                                if ($links[$i]["Type"] == "Text") {
                                                    echo $links[$i]["Desc"] . "</a>";
                                                } else {
                                                    echo '<img src="' . $linksImgs[$links[$i]["Type"]] . '" class="learnMoreIcon" title="' . $links[$i]["Desc"] . '"></a>';
                                                }
                                            }
                                        ?>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
								<div style="clear:both;"></div> 
                            </div>
                            <hr class="learnMoreBreak"/>
                            <?php
                                    }
                                } else {
                                    echo "Under Construction!";
                                }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        
            <!--Projects-->
            <div class="modal fade" id="modal-projects" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Projects and Extracurriculars</h5>
                            <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           <?php
                                $query = "SELECT * FROM `projects` WHERE `type` = 1;";
                                $events = mysqli_query($conn, $query);
                            
                                if (mysqli_num_rows($events) > 0) {
                                    while($row = mysqli_fetch_assoc($events)) {
                            ?>
                            <div class="learnMore-row" id="project-<?=$row["id"]?>">
                                <div class="learnMore-left">
                                    <img class="learnMore-left-content" src="content/gallery/<?=$row["gallery"]?>">
                                    <?php
                                        $visit = json_decode($row["visit"], true);
                                        if (!is_null($visit)) {
                                            for ($i = 0; $i < sizeof($visit); $i++) {
                                    ?>
                                        <center><a href="<?=$visit[$i]["Link"]?>"><?=$visit[$i]["Desc"]?></a></center>
                                    <?
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="learnMore-right">
                                    <div class="learnMore-Title"><?=$row["name"]?></div>
                                    <div class="learnMore-content learnMore-desc">
                                        <p>
                                            <?=$row["description"]?>
                                        </p>
                                    </div>
                                    <div class="learnMore-content learnMore-tech">
                                        <h3 class="title">Made with:</h3>
                                        <?=$row["tech"]?>
                                    </div>
                                    <?php
                                        $collab = json_decode($row["collab"], true);
                                        if (!is_null($collab)) {
                                    ?>
                                    <div class="learnMore-content learnMore-collab">
                                        <h3 class="title">Collaborators:</h3>
                                        <?php
                                            $out = "";
                                            for ($i = 0; $i < sizeof($collab); $i++) {
                                                echo $people[$collab[$i]];
                                                if ($i < sizeof($collab) - 1) { echo ", "; }
                                            }
                                        ?>
                                    </div>
                                    <?php
                                        }
                                        
                                        $links = json_decode($row["links"], true);
                                        if (!is_null($links)) {
                                    ?>
                                    <div class="learnMore-content learnMore-links">
                                        <?php
                                            for ($i = 0; $i < sizeof($links); $i++) {
                                                echo '<a href="' . $links[$i]["Link"] . '">';
                                                if ($links[$i]["Type"] == "Text") {
                                                    echo $links[$i]["Desc"] . "</a>";
                                                } else {
                                                    echo '<img src="' . $linksImgs[$links[$i]["Type"]] . '" class="learnMoreIcon" title="' . $links[$i]["Desc"] . '"></a>';
                                                }
                                            }
                                        ?>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
								<div style="clear:both;"></div> 
                            </div>
                            <hr class="learnMoreBreak"/>
                            <?php
                                    }
                                } else {
                                    echo "Under Construction!";
                                }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        
            <!--School Games-->
            <div class="modal fade" id="modal-school-games" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">School Work - Games</h5>
                            <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                           
                            <?php
                                $query = "SELECT * FROM `projects` WHERE `type` = 3;";
                                $events = mysqli_query($conn, $query);
                            
                                if (mysqli_num_rows($events) > 0) {
                                    while($row = mysqli_fetch_assoc($events)) {
                            ?>
                            <div class="learnMore-row" id="project-<?=$row["id"]?>">
                                <div class="learnMore-left">
                                    <img class="learnMore-left-content" src="content/gallery/<?=$row["gallery"]?>">
                                    <?php
                                        $visit = json_decode($row["visit"], true);
                                        if (!is_null($visit)) {
                                            for ($i = 0; $i < sizeof($visit); $i++) {
                                    ?>
                                        <center><a href="<?=$visit[$i]["Link"]?>"><?=$visit[$i]["Desc"]?></a></center>
                                    <?
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="learnMore-right">
                                    <div class="learnMore-Title"><?=$row["name"]?></div>
                                    <div class="learnMore-content learnMore-desc">
                                        <p>
                                            <?=$row["description"]?>
                                        </p>
                                    </div>
                                    <div class="learnMore-content learnMore-tech">
                                        <h3 class="title">Made with:</h3>
                                        <?=$row["tech"]?>
                                    </div>
                                    <?php
                                        $collab = json_decode($row["collab"], true);
                                        if (!is_null($collab)) {
                                    ?>
                                    <div class="learnMore-content learnMore-collab">
                                        <h3 class="title">Collaborators:</h3>
                                        <?php
                                            $out = "";
                                            for ($i = 0; $i < sizeof($collab); $i++) {
                                                echo $people[$collab[$i]];
                                                if ($i < sizeof($collab) - 1) { echo ", "; }
                                            }
                                        ?>
                                    </div>
                                    <?php
                                        }
                                        
                                        $links = json_decode($row["links"], true);
                                        if (!is_null($links)) {
                                    ?>
                                    <div class="learnMore-content learnMore-links">
                                        <?php
                                            for ($i = 0; $i < sizeof($links); $i++) {
                                                echo '<a href="' . $links[$i]["Link"] . '">';
                                                if ($links[$i]["Type"] == "Text") {
                                                    echo $links[$i]["Desc"] . "</a>";
                                                } else {
                                                    echo '<img src="' . $linksImgs[$links[$i]["Type"]] . '" class="learnMoreIcon" title="' . $links[$i]["Desc"] . '"></a>';
                                                }
                                            }
                                        ?>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
								<div style="clear:both;"></div> 
                            </div>
                            <hr class="learnMoreBreak"/>
                            <?php
                                    }
                                } else {
                                    echo "Under Construction!";
                                }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--School Websites-->
            <div class="modal fade" id="modal-school-websites" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">School Work - Websites</h5>
                            <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                           
                            <?php
                                $query = "SELECT * FROM `projects` WHERE `type` = 2;";
                                $events = mysqli_query($conn, $query);
                            
                                if (mysqli_num_rows($events) > 0) {
                                    while($row = mysqli_fetch_assoc($events)) {
                            ?>
                            <div class="learnMore-row" id="project-<?=$row["id"]?>">
                                <div class="learnMore-left">
                                    <img class="learnMore-left-content" src="content/gallery/<?=$row["gallery"]?>">
                                    <?php
                                        $visit = json_decode($row["visit"], true);
                                        if (!is_null($visit)) {
                                            for ($i = 0; $i < sizeof($visit); $i++) {
                                    ?>
                                        <center><a href="<?=$visit[$i]["Link"]?>"><?=$visit[$i]["Desc"]?></a></center>
                                    <?
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="learnMore-right">
                                    <div class="learnMore-Title"><?=$row["name"]?></div>
                                    <div class="learnMore-content learnMore-desc">
                                        <p>
                                            <?=$row["description"]?>
                                        </p>
                                    </div>
                                    <div class="learnMore-content learnMore-tech">
                                        <h3 class="title">Made with:</h3>
                                        <?=$row["tech"]?>
                                    </div>
                                    <?php
                                        $collab = json_decode($row["collab"], true);
                                        if (!is_null($collab)) {
                                    ?>
                                    <div class="learnMore-content learnMore-collab">
                                        <h3 class="title">Collaborators:</h3>
                                        <?php
                                            $out = "";
                                            for ($i = 0; $i < sizeof($collab); $i++) {
                                                echo $people[$collab[$i]];
                                                if ($i < sizeof($collab) - 1) { echo ", "; }
                                            }
                                        ?>
                                    </div>
                                    <?php
                                        }
                                        
                                        $links = json_decode($row["links"], true);
                                        if (!is_null($links)) {
                                    ?>
                                    <div class="learnMore-content learnMore-links">
                                        <?php
                                            for ($i = 0; $i < sizeof($links); $i++) {
                                                echo '<a href="' . $links[$i]["Link"] . '">';
                                                if ($links[$i]["Type"] == "Text") {
                                                    echo $links[$i]["Desc"] . "</a>";
                                                } else {
                                                    echo '<img src="' . $linksImgs[$links[$i]["Type"]] . '" class="learnMoreIcon" title="' . $links[$i]["Desc"] . '"></a>';
                                                }
                                            }
                                        ?>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
								<div style="clear:both;"></div> 
                            </div>
                            <hr class="learnMoreBreak"/>
                            <?php
                                    }
                                } else {
                                    echo "Under Construction!";
                                }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--School Presentations-->
            <div class="modal fade" id="modal-school-presentations" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">School Work - Presentations</h5>
                            <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                           
                            <?php
                                $query = "SELECT * FROM `projects` WHERE `type` = 4;";
                                $events = mysqli_query($conn, $query);
                            
                                if (mysqli_num_rows($events) > 0) {
                                    while($row = mysqli_fetch_assoc($events)) {
                            ?>
                            <div class="learnMore-row" id="project-<?=$row["id"]?>">
                                <div class="learnMore-left">
                                    <img class="learnMore-left-content" src="content/gallery/<?=$row["gallery"]?>">
                                    <?php
                                        $visit = json_decode($row["visit"], true);
                                        if (!is_null($visit)) {
                                            for ($i = 0; $i < sizeof($visit); $i++) {
                                    ?>
                                        <center><a href="<?=$visit[$i]["Link"]?>"><?=$visit[$i]["Desc"]?></a></center>
                                    <?
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="learnMore-right">
                                    <div class="learnMore-Title"><?=$row["name"]?></div>
                                    <div class="learnMore-content learnMore-desc">
                                        <p>
                                            <?=$row["description"]?>
                                        </p>
                                    </div>
                                    <div class="learnMore-content learnMore-tech">
                                        <h3 class="title">Made with:</h3>
                                        <?=$row["tech"]?>
                                    </div>
                                    <?php
                                        $collab = json_decode($row["collab"], true);
                                        if (!is_null($collab)) {
                                    ?>
                                    <div class="learnMore-content learnMore-collab">
                                        <h3 class="title">Collaborators:</h3>
                                        <?php
                                            $out = "";
                                            for ($i = 0; $i < sizeof($collab); $i++) {
                                                echo $people[$collab[$i]];
                                                if ($i < sizeof($collab) - 1) { echo ", "; }
                                            }
                                        ?>
                                    </div>
                                    <?php
                                        }
                                        
                                        $links = json_decode($row["links"], true);
                                        if (!is_null($links)) {
                                    ?>
                                    <div class="learnMore-content learnMore-links">
                                        <?php
                                            for ($i = 0; $i < sizeof($links); $i++) {
                                                echo '<a href="' . $links[$i]["Link"] . '">';
                                                if ($links[$i]["Type"] == "Text") {
                                                    echo $links[$i]["Desc"] . "</a>";
                                                } else {
                                                    echo '<img src="' . $linksImgs[$links[$i]["Type"]] . '" class="learnMoreIcon" title="' . $links[$i]["Desc"] . '"></a>';
                                                }
                                            }
                                        ?>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
								<div style="clear:both;"></div> 
                            </div>
                            <hr class="learnMoreBreak"/>
                            <?php
                                    }
                                } else {
                                    echo "Under Construction!";
                                }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        
            <!--Others-->
            <div class="modal fade" id="modal-others" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Other Projects</h5>
                            <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                           
                            <?php
                                $query = "SELECT * FROM `projects` WHERE `type` = 5;";
                                $events = mysqli_query($conn, $query);
                            
                                if (mysqli_num_rows($events) > 0) {
                                    while($row = mysqli_fetch_assoc($events)) {
                            ?>
                            <div class="learnMore-row" id="project-<?=$row["id"]?>">
                                <div class="learnMore-left">
                                    <img class="learnMore-left-content" src="content/gallery/<?=$row["gallery"]?>">
                                    <?php
                                        $visit = json_decode($row["visit"], true);
                                        if (!is_null($visit)) {
                                            for ($i = 0; $i < sizeof($visit); $i++) {
                                    ?>
                                        <a href="<?=$visit[$i]["Link"]?>"><?=$visit[$i]["Desc"]?></a>
                                    <?
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="learnMore-right">
                                    <div class="learnMore-Title"><?=$row["name"]?></div>
                                    <div class="learnMore-content learnMore-desc">
                                        <p>
                                            <?=$row["description"]?>
                                        </p>
                                    </div>
                                    <div class="learnMore-content learnMore-tech">
                                        <h3 class="title">Made with:</h3>
                                        <?=$row["tech"]?>
                                    </div>
                                    <?php
                                        $collab = json_decode($row["collab"], true);
                                        if (!is_null($collab)) {
                                    ?>
                                    <div class="learnMore-content learnMore-collab">
                                        <h3 class="title">Collaborators:</h3>
                                        <?php
                                            $out = "";
                                            for ($i = 0; $i < sizeof($collab); $i++) {
                                                echo $people[$collab[$i]];
                                                if ($i < sizeof($collab) - 1) { echo ", "; }
                                            }
                                        ?>
                                    </div>
                                    <?php
                                        }
                                        
                                        $links = json_decode($row["links"], true);
                                        if (!is_null($links)) {
                                    ?>
                                    <div class="learnMore-content learnMore-links">
                                        <?php
                                            for ($i = 0; $i < sizeof($links); $i++) {
                                                echo '<a href="' . $links[$i]["Link"] . '">';
                                                if ($links[$i]["Type"] == "Text") {
                                                    echo $links[$i]["Desc"] . "</a>";
                                                } else {
                                                    echo '<img src="' . $linksImgs[$links[$i]["Type"]] . '" class="learnMoreIcon" title="' . $links[$i]["Desc"] . '"></a>';
                                                }
                                            }
                                        ?>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
								<div style="clear:both;"></div> 
                            </div>
                            <hr class="learnMoreBreak"/>
                            <?php
                                    }
                                } else {
                                    echo "Under Construction!";
                                }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        
        
        <script src="/src/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    </body>
</html>