<?php
/*
 * @author J.R. MacMillian
 * @copyright Copyright (c) 2016, J.R. MacMillian
 * @link http://www.macmillian.net
 * @license https://opensource.org/licenses/MIT MIT
 */
    
if(isset($_GET['file'])){
	$filename = $_GET['file'];
	$bodytag = '<body onload="plus_loadFile();"> ';
}else{
	$filename = 'none';
	$bodytag = '<body onload="start();">';
}

?><!DOCTYPE html>  
<html lang="en">
    <head>  
        <meta charset="utf-8">  
        <title> Slow Query Logs </title>

        <!-- base -->
        <link rel="stylesheet" href="css/style.css">
        <script src="js/script.js"></script>
        <script src="js/plus.js"></script>
        
        <!-- visualizer -->
        <script type="text/javascript" src="js/enhance.js"></script>	
        <script type="text/javascript">
            // Run capabilities test
            enhance({
                loadScripts: [
                    {src: 'js/excanvas.js', iecondition: 'all'},
                    'https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js',
                    'js/visualize.jQuery.js'
                ],
                loadStyles: [
                    'css/visualize.css',
                    'css/visualize-dark.css'
                ]	
            });   
        </script>

        <!-- list --> 
        <script src="js/list.js"></script>
		<script type="text/javascript">
			var plus_pretty_filename = "<?php echo $filename; ?>";
			var plus_filename = "<?php echo $filename; ?>";
		</script>
    </head>  
    <?php echo $bodytag; ?>
		<a href="index.php" > <- Back to Index </a>
        <h1> Slow Query Logs</h1>
        <div id="drop_zone">Drop log file here</div>

        <output id="drop_result"></output>
        <output id="load_result"></output>

        <div id="chart_container">
            <div id="chart"></div>
        </div>

        <br /><br />

        <table id="time_list" cellpadding="5">
            <caption>Slow Queries - Daily Average</caption>
            <thead class="header">
                <tr>
                    <td></td>
                    <th scope="col">00</th>
                    <th scope="col">01</th>
                    <th scope="col">02</th>
                    <th scope="col">03</th>
                    <th scope="col">04</th>
                    <th scope="col">05</th>
                    <th scope="col">06</th>
                    <th scope="col">07</th>
                    <th scope="col">08</th>
                    <th scope="col">09</th>
                    <th scope="col">10</th>
                    <th scope="col">11</th>
                    <th scope="col">12</th>
                    <th scope="col">13</th>
                    <th scope="col">14</th>
                    <th scope="col">15</th>
                    <th scope="col">16</th>
                    <th scope="col">17</th>
                    <th scope="col">18</th>
                    <th scope="col">19</th>
                    <th scope="col">20</th>
                    <th scope="col">21</th>
                    <th scope="col">22</th>
                    <th scope="col">23</th>        
                </tr>
            </thead>

            <tbody class="list"></tbody>

            <tfoot>
                <tr id="time_list_item">
                    <th scope="row" class="dayName"></th>
                    <td class="00"></td>
                    <td class="01"></td>
                    <td class="02"></td>
                    <td class="03"></td>
                    <td class="04"></td>
                    <td class="05"></td>
                    <td class="06"></td>
                    <td class="07"></td>
                    <td class="08"></td>
                    <td class="09"></td>
                    <td class="10"></td>
                    <td class="11"></td>
                    <td class="12"></td>
                    <td class="13"></td>
                    <td class="14"></td>
                    <td class="15"></td>
                    <td class="16"></td>
                    <td class="17"></td>
                    <td class="18"></td>
                    <td class="19"></td>
                    <td class="20"></td>
                    <td class="21"></td>
                    <td class="22"></td>
                    <td class="23"></td>
                </tr>
            </tfoot>
        </table>

        <table id="log_list">
            <thead class="header">
                <tr id="search">
                    <th colspan="10">
                        <span class="list_search">
                            <span id="search_count"></span>
                            <label for="log_list_search">Filter:</label> 
                            <input id="log_list_search" class="search" />
                        </span>
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="sort" data-sort="date">date</th>
                    <th scope="col" class="sort" data-sort="query_time">query time</th>
                    <th scope="col" class="sort" data-sort="lock_time">lock time</th>
                    <th scope="col" class="sort" data-sort="rows_sent">rows sent</th>
                    <th scope="col" class="sort" data-sort="rows_examined">rows examined</th>
                    <th scope="col" class="sort" data-sort="db_name">db user</th>
                    <th colspan="4" scope="col" class="sort" data-sort="query_string">query string</th>
                </tr>
            </thead>

            <tbody class="list"></tbody>

            <tfoot>
                <tr id="log_list_item">
                    <th scope="row" class="date"></th>
                    <td class="query_time"></td>
                    <td class="lock_time"></td>
                    <td class="rows_sent"></td>
                    <td class="rows_examined"></td>
                    <td class="db_name"></td>
                    <td colspan="4" class="qs"><pre class="query_string"></pre></td>
                </tr>
            </tfoot>
        </table>

    </body>  
</html>  