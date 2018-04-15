





<HTML>

  <style>
  body {
    background-color: White;
  }


  p {
    color: maroon;
    font-family: verdana;
    font-size: 17px;
  }
  table, th, td {
      border: 1px solid black;
  }
</style>








<?php


$dbconn = pg_connect ("host=localhost user=sgigliotti password=0554267");
       if($dbconn) {
         echo 'connected';
       } else {
         echo 'there has been an error connecting';
       }
       $f =$_POST['first'];
       $l =$_POST['last'];
       $e =$_POST['email'];
       $result = pg_query($dbconn, "SELECT FirstName, LastName FROM MParticipatesIn WHERE FirstName = '{$f}' OR LastName = '{$l}' OR email = '{$e}'");
       if (!$result) {
  echo "An error occurred.\n";
  exit;
}

echo '<table>
<tr>
<th>FirstName</th>
<th>LastName</th>
</tr>';

while ($row = pg_fetch_row($result)) {
echo '<tr>
<td>'. $row[0] .'</td>
<td>'. $row[1] .'</td>
</tr>';

}
echo '</table>';


?>
          </HTML>
