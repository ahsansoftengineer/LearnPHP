<h1>MY SQL with PHP My Admin</h1>
<h2>To Configure and Settings of PHP follow the following Steps</h2>
<ol>
  <li>Set the Ports in the following Files</li>
  <li>C:\xampp\phpMyAdmin\config.inc
    <ul>
      <li>$cfg['Servers'][$i]['port'] = '3307';</li>
    </ul>
  </li>
  <li>XAMP SERVER Settings
    <ul>
    <li>MAIN XAMP SERVER Settings
        <ul>
          <li>Click on the Top Config Button in XAMPP Control Pannel
            <ul>
              <li>config>Service and Port Settings>MySQL Tab</li>
              <li>Set Mysql Port to 3307</li>
            </ul>
          </li>
        </ul>
      </li>
      <li>MY SQL Config
        <ul>
          <li>Click the Config Button to infront of MySql</li>
          <li>C:\xampp\mysql\bin\my.ini</li>
          <li>Set port on two places with the file
            <ul>
              <li>port=3307</li>
            </ul>
          </li>

        </ul>
      </li>
    </ul>
  </li>
  <li>Now Hit the following URL</li>
  <li><a href="https://localhost/phpmyadmin/">PHP My Admin</a></li>
</ol>