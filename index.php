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
        
        <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"-->
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
                <p>My name is Harry Zhang and I'm a 17 year old high school student at Don Mills Collegiate Institute. I have a passion for technology and an unending thrist for new and creative ideas. Ever since grade 6, I have always wanted to learn more, create more and explore everything in technology.</p>
                <hr/>
                <h2 class="title bodyElemSubTitle">Skills and Experience</h2>
                <p style="font-size: 14px"><i>One can never be the best, for there is always more to do and more to learn...</i></p>
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
                    From Winnipeg to Waterloo, I've always enjoyed the thrill of going to new places, meeting new people and discovering new innovations.
                </p>
                <div class="learnMoreContainer">
                    <a href class="learnMore" data-toggle="modal" data-target="#modal-events">Learn more</a>
                </div>
            </div>
            
            <div id="projects" class="bodyElem">
                <h1 class="title bodyElemTitle">Projects and Extracurriculars</h1>
                <img src="content/banner/Banner_Projects.png" class="bodyElemBanner" title="StudyHub, DMCI Robtoics">
                <p>
                    Rarely do I get time to work on projects, but if I do, it's used to develop new skills or it's with a goal in mind to help others.
                </p>
                <div class="learnMoreContainer">
                    <a href class="learnMore" data-toggle="modal" data-target="#modal-projects">Learn more</a>
                </div>
            </div>
            
            <div id="school" class="bodyElem">
                <h1 class="title bodyElemTitle">School</h1>
                <img src="content/banner/Banner_School.png" class="bodyElemBanner" title="Blog of the Flies (Grade 9 English Project), Tower Crane Presentation (Grade 9 Tech Summative), Scrabble Game (Grade 11 Assignment)">
                <p>
                    It's amazing, the things you can do with code. Something as plain and boring as day to day homework can be made to be so amazing, and done with such creativity. Check them out below.
                </p>
                <div class="learnMoreContainer">
                    <a href class="learnMore" data-toggle="modal" data-target="#modal-school-websites">Websites</a>
                    <a href class="learnMore" data-toggle="modal" data-target="#modal-school-games">Games</a>
                    <a href class="learnMore" data-toggle="modal" data-target="#modal-school-presentations">Presentation</a>
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
                        <a href="https://www.facebook.com/zh.harry"><img src="content/social/Facebook-512.png" class="socialIcon" title="Facebook"></a>
                        <a href="https://github.com/zharry"><img src="content/social/GitHub-Mark-120px-plus.png" class="socialIcon" title="GitHub"></a>
                        <a href="https://devpost.com/zharry"><img src="content/social/DevPost.png" class="socialIcon" title="Devpost"></a>
                        <a href="https://www.linkedin.com/in/zhharry/"><img src="content/social/LinkedIn-512.png" class="socialIcon" title="LinkedIn"></a>
                        <a href="mailto:zh.harry@yahoo.ca?subject=Hello!"><img src="content/social/email.png" class="socialIcon" title="Email"></a>
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
                                        $visit = json_decode($json, true);
                                        var_dump($visit);
                                    ?>
                                    <center><a href="http://ideashare.ml">View Site</a></center>
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
                                    <div class="learnMore-content learnMore-collab">
                                        <h3 class="title">Collaborators:</h3>
                                        <a class="collab-link" href="https://jimgao.tk">Jim Gao</a>
                                    </div>
                                    <div class="learnMore-content learnMore-links">
                                        <a href="https://github.com/zharry/ideashare-frontend"><img src="content/social/GitHub-Mark-120px-plus.png" class="learnMoreIcon" title="GitHub for Frontend development"></a>
                                        <a href="https://devpost.com/software/ideashare"><img src="content/social/DevPost.png" class="learnMoreIcon" title="DevPost"></a>
                                    </div>
                                </div>
                            </div>
                            <hr class="learnMoreBreak"/>
                            <?php
                                    }
                                } else {
                                    echo "Under Construction!";
                                }
                            ?>                        
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
                            Under Construction
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
                            Under Construction
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
                            Under Construction
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
                            Under Construction
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
                            Under Construction
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