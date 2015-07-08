<!doctype html>
<html>

<head>

	<?php include 'header.php'; ?>
	
</head>


<body>

	
   	<!-- #container START =================================================================================== -->
    <div id="container">
    
    
    
    	<!-- header START =================================================================================== -->
        <header class="topheader">
			<?php include 'nav.php'; ?>

            <div class="clear"></div>
        
            <div id="slides-container" class="slides-container width">
                <div id="slides">
                    <div>
                    
                    	<img src="images/Linux_logo.png" alt="Linux" width="192" height="240" class="slide-image-left">
                        
						<h2>Easy way to work as <span>"Linux admin"</span></h2>
                        <p>
                        	Reboot your web server throuth this convenient web based admin tool, so you can spend your time doing more fun things. If you encounter problems using your
                            web admin tool, stop what you are doing and write more code to improve your server. You will save more time doing it.
                        </p>                
                        <!--p style="text-align:center;"><a href="#" class="button button-slider">Learn more about this site</a></p-->
                    </div>
                    <div>
                    	<img src="images/RaspberryPilogo.png" alt="Linux" width="190" height="240" class="slide-image-left">
                        <h2>Buy a <span>"Raspberry Pi"</span> - Write your own code</h2>
                        <p>
                        	Why waste your time. All the server side problems are solvable by learning unix commands and PHP, Python CGI programing.
                            Do it now and stop waisting your time using SSH to run commands. You can automate system!
                       	</p>
                    </div>
                </div>
                
                
                <div class="controls">
                    <span class="jFlowNext">
                        <span>Next</span>
                    </span>
                    <span class="jFlowPrev">
                        <span>Prev</span>
                    </span>
                </div>    
                
                    
                <div id="myController" class="hidden">
                    <!-- COPY AND PASTE SLIDE CONTROL FOR EACH NEW SLIDE -->
                    <span class="jFlowControl">Slide 1</span>
                    <span class="jFlowControl">Slide 2</span>
                </div>
            </div>
        
        </header>
        <!-- header END =================================================================================== -->
    
    
    
   
    
    	<!-- #body START =================================================================================== -->
        <div id="body" class="width">
        
            <section id="content" class="two-column with-right-sidebar">
                <article>
                    <h2>Introduction to MALIBU Web admin tool</h2>
                    <div class="article-info">Posted on <time datetime="2014-11-29">2014-11-29</time> by <a href="#" rel="author">Seung Hong</a></div>
        
                    <p>
                    	Welcome to MALIBU admin tool. This tool is built on free web template with <strong>jQuery</strong> and <strong>Bootstrap</strong>.
                        Most of the programmings are done using PHP CGI, BASH script and AJAX. You got full control over your system now. Enjoy it.
                        
                    </p>
                    
                    <p>Server runs several daemons listed below.</p>
                    
                    <ul class="styledlist">
                        <li>Samba</li>
                        <li>Apache2</li>
                        <li>PHP5</li>
                        <li>MySQL</li>
                        <li>phpMyAdmin</li>
                        <li>Transmission Client</li>
                        <li>PLEX Server</li>
                        <li>HandBrakeCLI</li>
                    </ul>
					
        			<a href="#" class="button">Like</a> 
                    <!--<a href="#" class="button button-reversed">Contact Admin</a>-->
                   
                </article>
                
                
            
                <article class="expanded">
        
                    <h2>New features added</h2>
                    <div class="article-info">Posted on <time datetime="2014-11-29">2014-11-29</time> by <a href="#" rel="author">Seung Hong</a></div>
    
                    <p>We've just added following new features.</p>
        
                    <h3>Automated Server Reboot</h3>
        
                    <p>We have included automated reboot function by using PHP CGI script. By one click, you can reboot this server.</p>
        
                    <a href="#" class="button">Like</a>
                    <a href="#" class="button button-reversed" id="reboot-button">Reboot</a>
                    <div class="button button-reversed abox" id="reboot-status"><span>Reboot Status</span> Ready</div>
                    
                    
                    
                    
                    <h3>Automated Server Reboot</h3>
        
                    <p>We have included automated reboot function by using PHP CGI script. By one click, you can reboot this server.</p>
        
                    <a href="#" class="button">Like</a>
                    <a href="#" class="button button-reversed" id="chmod-button">chmod 777 -R</a>
                    <div class="button button-reversed abox" id="chmod-status"><span>Server Status</span> Ready</div>
                    
                    <div class="floating-box">
                        <p>
                            <pre></pre>
                        </p>
                    </div>
                </article>
                
                
            </section>
            
            
            
            
            <!-- Sidebar START --> 
            <aside class="sidebar big-sidebar right-sidebar">
                <ul>	
                    <li>
                        <h4>News</h4>
                        <ul class="newslist">
                            <li><p><span class="newslist-date">Nov 29</span> MALIBU server is finally transformed into Lunux. (Ubuntu Server 14.04.1 LTS)</p></li>
                            <li><p><span class="newslist-date">Nov 29</span> Transmission Torrent Client is now given 32mb cache to prevent heavy HDD swapping. This will improve download and upload speed while files are being downloaded through large amount of peer connections.</p></li>
                		</ul>
                    </li>
        
            		<li>
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="http://www.htpcbeginner.com/install-transmission-web-interface-on-ubuntu-1204/" target="new">Install Transmission on Ubuntu</a></li>
                            <li><a href="https://forums.plex.tv/index.php/topic/113865-ubuntu-1404-fresh-install-and-installing-plex/" target="new">install Plex on Ubuntu</a></li>
                            <li><a href="http://www.admin-magazine.com/Articles/Automating-with-Expect-Scripts" target="new">Using Expect Scripts to Automate Tasks</a></li>
                            <li><a href="http://stackoverflow.com/questions/17059682/how-to-pass-argument-in-expect-through-command-line-in-shell-script" target="new">How to pass argument in expect through command line in shell script</a></li>
                            <li><a href="http://www.admin-magazine.com/Articles/Automating-with-Expect-Scripts" target="new">Using Expect Scripts to Automate Tasks</a></li>
                		</ul>
                    </li>
                </ul>
            </aside>
            <!-- Sidebar END --> 
            
            
            
            
            <div class="clear"></div>
            
            
        </div>
        <!-- #body END =================================================================================== -->
        
        
        
        
        <footer>
            <div class="footer-content width">
                <ul>
                    <li><h4>Main Programmer</h4></li>
                    <li>Seung Hong</li>
                    <li>hsurf22@gmail.com</li>
                    <li>www.seunghong.com</li>
                    <li>1717 Crenshaw Blvd<br />Los Angeles, CA 90019</li>

              
                </ul>
                
                <ul>
                    <li><h4>Social Media</h4></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">YouTube</a></li>
                    <li><a href="#">Pinterest</a></li>

                </ul>
    
            <ul>
                    <li><h4>Coding</h4></li>
                    <li>PHP</li>
                    <li>jQuery</li>
                    <li>CSS</li>
                    <li>HTML5</li>
                    <li>BASH Script</li>
                    
                </ul>
                
                <ul class="endfooter">
                    <li><h4>Developper Comments</h4></li>
                    <li>All the codes are freely available to download. Download it and improve with your coding skills and publish them for free again. We can make our world better. Seung</li>
                </ul>
                
                <div class="clear"></div>
            </div>
            <div class="footer-bottom">
                <p style="text-transform: uppercase;">MALIBU WEB ADMIN TOOL 2014. | <a href="http://malibuns.com/">MALIBUNS.com</a> </p>
             </div>
        </footer>
        

        
    </div>
   	<!-- #container END =================================================================================== -->
</body>
</html>