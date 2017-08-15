<?php

    require_once('/etc/mysql-cred/mysql-creds.php');
    $conn = mysqli_connect($mysql_creds["host"], $mysql_creds["user"], $mysql_creds["pass"], "zharry");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

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
                            ?>
                            <div class="learnMore-row">
                                <div class="learnMore-left">
                                    <img class="learnMore-left-content" src="content/gallery/IdeaShare.jpg">
                                    <center><a href="http://ideashare.ml">View Site</a></center>
                                </div>
                                <div class="learnMore-right">
                                    <div class="learnMore-Title">IdeaShare</div>
                                    <div class="learnMore-content learnMore-desc">
                                        <p>
                                            Developed for (and won) during the Hack The North 2016 hackathon, IdeaShare is a platform for users to share and distribute ideas. It featured a Natural Language Processing engine to interpret submissions and added them to a tag cloud, where other users can search for them.
                                        </p>
                                    </div>
                                    <div class="learnMore-content learnMore-tech">
                                        <h3 class="title">Made with:</h3>
                                        JS, Java, MySQL
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
                            <div class="learnMore-row">
                                <div class="learnMore-left">
                                    <img class="learnMore-left-content" src="content/gallery/Aircheck-NG.png">
                                </div>
                                <div class="learnMore-right">
                                    <div class="learnMore-Title">Aircheck-NG</div>
                                    <div class="learnMore-content learnMore-desc">
                                        <p>
                                            Made during the Space Apps 2016 Hackathon in Toronto, Aircheck-NG is a air quality and public health tracking tool. The application neatly displays a collection of crowd-soursed health data and severity to compare it against live environmental factors.
                                        </p>
                                    </div>
                                    <div class="learnMore-content learnMore-tech">
                                        <h3 class="title">Made with:</h3>
                                        JS, PHP, Java, MySQL
                                    </div>
                                    <div class="learnMore-content learnMore-collab">
                                        <h3 class="title">Collaborators:</h3>
                                        <a class="collab-link" href="https://jackyliao123.tk">Jacky Liao</a>, 
                                        <a class="collab-link" href="https://jimgao.tk">Jim Gao</a>, 
                                        <a class="collab-link" href="https://guhenry3.tk">Henry Gu</a>, 
                                        <a class="collab-link" href="https://bcheng.cf">Benjamin Cheng</a>, 
                                        <a class="collab-link" href="javascript:;">Aaron Du</a>
                                    </div>
                                    <div class="learnMore-content learnMore-links">
                                        <a href="https://2016.spaceappschallenge.org/challenges/earth/aircheck/projects/aircheck-ng"><img src="content/social/SpaceApps-Custom.png" class="learnMoreIcon" title="Official NASA Space Apps Submission page"></a>
                                        <a href="https://github.com/HackenDoz/aircheck-client"><img src="content/social/GitHub-Mark-120px-plus.png" class="learnMoreIcon" title="GitHub for Aircheck frontend client"></a>
                                    </div>
                                </div>
                            </div>
                            
                            <hr class="learnMoreBreak"/>
                            <div class="learnMore-row">
                                <div class="learnMore-left">
                                    <img class="learnMore-left-content" src="content/gallery/SkillsCanada.png">
                                    <center><a href="https://zharry.tk/projects/others/skills2017/canada/module-c/">Skills Canada (C)</a></center>
                                    <center><a href="https://zharry.tk/projects/others/skills2017/canada/module-b/">Skills Canada (B)</a></center>
                                    <center><a href="https://zharry.tk/projects/others/skills2017/ontario">Skills Ontario</a></center>
                                    <center><a href="https://zharry.tk/projects/others/skills2017/tdsb">TDSB Skills</a></center>
                                </div>
                                <div class="learnMore-right">
                                    <div class="learnMore-Title">Skills Competition 2017</div>
                                    <div class="learnMore-content learnMore-desc">
                                        <p>
                                            Earning a Gold medal in the national competition, my time at Canada's largest vocational skills competition was an experience of a lifetime. But to reach the national level, I frist had to go through the provincial and school board level. The requirements where quite simple, given a set task and set resources, design and create the specified website under the given time constraints (8-12 hours) without internet access. For the board level contest, the objective was to create a website to showcase the Canada 150 event. The provincial level contest was aimed at creating an portfolio with an administrative panel for editing and creating projects. Finally, in the national level the goal was to create a website for the Winnipeg Railway Museum. It was split into 3 modules; module a for the drawing and design of the website, module b for the html, css and js side, then module c for the backend events and tickets purchasing engine. My creations are listed below the image, but it's not the prize that I'll remember, it's the people I met, the teachers that got me to this event and the wonderful food I had in Winnipeg that will keep this memory alive.
                                        </p>
                                    </div>
                                    <div class="learnMore-content learnMore-tech">
                                        <h3 class="title">Made with:</h3>
                                        JS, PHP, MySQL
                                    </div>
                                    <div class="learnMore-content learnMore-collab">
                                    </div>
                                    <div class="learnMore-content learnMore-links">
                                        <a href="http://skillscompetencescanada.com/en/skills-canada-national-competition/scnc-winnipeg-2017/">Skills Canada Contest Website, </a>
                                        <a href="http://skillscompetencescanada.com/en/skills-canada-national-competition/scnc-2017-results/">Results Listing</a>
                                    </div>
                                </div>
                            </div>
                            
                            <hr class="learnMoreBreak"/>
                            <div class="learnMore-row">
                                <div class="learnMore-left">
                                    <img class="learnMore-left-content" src="content/gallery/LaFi.jpg">
                                </div>
                                <div class="learnMore-right">
                                    <div class="learnMore-Title">LaFi</div>
                                    <div class="learnMore-content learnMore-desc">
                                        <p>
                                            Inspired by the state-of-art fibre optics technology, LaFi is engineered to transmit data between two computers through the use of lasers. A set of two Raspberry Pi's are used to transfer any binary based information by blinking on and off. to represent bits. This project was submitted to and won frist place at Massey Hacks III (2017).
                                        </p>
                                    </div>
                                    <div class="learnMore-content learnMore-tech">
                                        <h3 class="title">Made with:</h3>
                                        C++, Raspberry-Pi
                                    </div>
                                    <div class="learnMore-content learnMore-collab">
                                        <h3 class="title">Collaborators:</h3>
                                        <a class="collab-link" href="https://guhenry3.tk">Henry Gu</a>, 
                                        <a class="collab-link" href="javascript:;">Jaden Wang</a>, 
                                        <a class="collab-link" href="javascript:;">Andy Huang</a>
                                    </div>
                                    <div class="learnMore-content learnMore-links">
                                        <a href="https://devpost.com/software/la-fi"><img src="content/social/DevPost.png" class="learnMoreIcon" title="Project on DevPost"></a>
                                    </div>
                                </div>
                            </div>
                            
                            <hr class="learnMoreBreak"/>
                            <div class="learnMore-row">
                                <div class="learnMore-left">
                                    <img class="learnMore-left-content" src="content/gallery/localhackday-2015.png">
                                    <center><a href="https://jackyliao123.tk/projects/hackathon-oct15/">View Site</a></center>
                                </div>
                                <div class="learnMore-right">
                                    <div class="learnMore-Title">Local Hack Day, October 2015</div>
                                    <div class="learnMore-content learnMore-desc">
                                        <p>
                                            Based on agar.io, we made a "fortress defense" game where players were able to shoot others and place barriers. The goal of the game was to stay alive the longest by outlasting and killing all other players. 
                                        </p>
                                    </div>
                                    <div class="learnMore-content learnMore-tech">
                                        <h3 class="title">Made with:</h3>
                                        JS, Java
                                    </div>
                                    <div class="learnMore-content learnMore-collab">
                                        <h3 class="title">Collaborators:</h3>
                                        <a class="collab-link" href="https://jackyliao123.tk">Jacky Liao</a>, 
                                        <a class="collab-link" href="javascript:;">Eric Li</a>
                                    </div>
                                    <div class="learnMore-content learnMore-links">
                                    </div>
                                </div>
                            </div>
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