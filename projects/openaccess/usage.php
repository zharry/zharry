<?php
include('includes/header.php');
?>
<hr/>
<center><h4>The connection methods are listed below by <i>Operating System - Purpose (Method)</i></h4>
<div class="alert alert-warning">
  <strong>Notice!</strong> Mac OS X, Linux, Windows XP and Windows 7 is not supported during early access!
</div>
<div class="alert alert-info">
  The current instructions are tested on Windows 10, iOS 9.3.1, iOS 10.3.3, Android 4.4.2.
</div>
</center>
<hr/>

<div id="accordion" role="tablist" aria-multiselectable="true">
  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Windows 10 - School VPN (Shadowsocks)
        </a>
      </h5>
    </div>
    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="card-block">
        1. Download Shadowsocks client (<a href="https://github.com/shadowsocks/shadowsocks-windows/releases/download/4.0.5/Shadowsocks-4.0.5.zip">here</a>)<br/>
		2. Extract and Launch "Shadowsocks.exe"<br/>
		3. Enter the following settings that match the credentials from your dashboard<br/>
		&nbsp a. "Server Addr" is the Server IP<br/>
		&nbsp b. "Server Port" is the Server Port<br/>
		&nbsp c. "Password" is the Password<br/>
		&nbsp d. "Encryption" is the Encryption Method<br/>
		&nbsp e. Leave everything else as is<br/>
		4. Click the OK button<br/>
		5. Go into your system tray right click the Shadowsocks application (paper airplane) icon<br/>
		&nbsp a. Enable "Start on Boot" to keep the application in the tray<br/>
		&nbsp b. Click "Enable System Proxy" to start the connection<br/>
		6. Open the Windows Settings (NOT Control Panel)<br/>
		7. Go into Network & Internet, then Proxy<br/>
		&nbsp a. "Automatically dtect settings" should be OFF<br/>
		&nbsp b. "Use setup script" should be OFF<br/>
		&nbsp c. "Use a proxy server" should be ON<br/>
		&nbsp d. "Address" should be 127.0.0.1<br/>
		&nbsp e. "Port" should be 1080<br/>
		&nbsp f. "Use proxy server except for..." should be empty<br/>
		&nbsp f. "Don't use proxy server for local..." should be checked<br/>
		8. Click Save, you should be connected<br/>
		9. To disconnect just turn off "Use a proxy server" in the Windows Settings<br/>
		10. To reconnect
		&nbsp a. Ensure that the Shadowsocks "Enable System Proxy" is enabled in your system tray
		&nbsp b. Turn on the "Use a proxy server" in the Windows Settings<br/>
	  </div>
    </div>
  </div>
  
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          iOS - School VPN (Shadowsocks)
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
        1. Install Shadow Proxy from the App Store<br/>
		2. Open App<br/>
		3. Enter the following settings that match the credentials from your dashboard<br/>
		&nbsp a. "Server IP" is the Server IP<br/>
		&nbsp b. "Port" is the Server Port<br/>
		&nbsp c. "Password" is the Password<br/>
		&nbsp d. "Method" is the Encryption Method<br/>
		&nbsp e. "Mode" should remain unchanged (Auto)<br/>
		5. Switch the Disconnected button on to begin the connection.<br/>
		6. To disconnect and reconnect just reopen the app and tap the Connected/Disconnected button<br/>
	  </div>
    </div>
  </div>
  
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Android - School VPN (Shadowsocks)
        </a>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="card-block">
        1. Install Shadowsocks from the Google Play Store<br/>
		2. Open App<br/>
		3. Tap the "Create Profile" (+) button in the top right<br/>
		4. Then click on "Manual Settings"<br/>
		5. Enter the following settings that match the credentials from your dashboard<br/>
		&nbsp a. "Server" is the Server IP<br/>
		&nbsp b. "Remote Port" is the Server Port<br/>
		&nbsp c. "Local Port" should remain unchanged (1080)<br/>
		&nbsp d. "Password" is the password<br/>
		&nbsp e. "Encrypt Method" is the Ecryption Method<br/>
		&nbsp f. Leave everything else as is<br/>
		6. Click the checkmark in the top right to finish the configuration<br/>
		7. Tap the new Profile and Click the paper airplane icon (bottom right) to connect!<br/>
		8. To disconnect and reconnect just reopen the app and tap the paper airplane button. (Green=On, Grey=Off)<br/>
	  </div>
    </div>
  </div>
  
  <div class="card">
    <div class="card-header" role="tab" id="headingFour">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Windows - Alternative 1 (L2TP)
        </a>
      </h5>
    </div>
    <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
      <div class="card-block">
        Coming soon...
	  </div>
    </div>
  </div>
  
  <div class="card">
    <div class="card-header" role="tab" id="headingFive">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          Windows - Alternative 2 (OpenVPN)
        </a>
      </h5>
    </div>
    <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive">
      <div class="card-block">
        Coming soon...
	  </div>
    </div>
  </div>
  
  <div class="card">
    <div class="card-header" role="tab" id="headingSix">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          iOS - Alternative 1 (L2TP)
        </a>
      </h5>
    </div>
    <div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingSix">
      <div class="card-block">
        Coming soon...
	  </div>
    </div>
  </div>
  
  <div class="card">
    <div class="card-header" role="tab" id="headingSeven">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
          iOS - Alternative 2 (OpenVPN)
        </a>
      </h5>
    </div>
    <div id="collapseSeven" class="collapse" role="tabpanel" aria-labelledby="headingSeven">
      <div class="card-block">
        Coming soon...
	  </div>
    </div>
  </div>
  
  <div class="card">
    <div class="card-header" role="tab" id="headingEight">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
          Android - Alternative 1 (L2TP)
        </a>
      </h5>
    </div>
    <div id="collapseEight" class="collapse" role="tabpanel" aria-labelledby="headingEight">
      <div class="card-block">
        Coming soon...
	  </div>
    </div>
  </div>
  
  <div class="card">
    <div class="card-header" role="tab" id="headingNine">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
          Android - Alternative 2 (OpenVPN)
        </a>
      </h5>
    </div>
    <div id="collapseNine" class="collapse" role="tabpanel" aria-labelledby="headingNine">
      <div class="card-block">
        Coming soon...
	  </div>
    </div>
  </div>
</div>

<hr/>
<?php
include('includes/footer.php');
?>