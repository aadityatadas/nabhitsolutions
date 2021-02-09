<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=document_name.doc");

echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo "<body>";
echo '<p class="western" lang="en-US"><span style="font-family: "Times New Roman", serif;"><span style="font-size: large;"><strong>Analysis</strong></span></span></p>
<p lang="en-US"><span style="font-family: "Times New Roman", serif;"><span style="font-size: medium;">The area of adherence and their compliance is shown below</span></span></p>
<table width="610" cellspacing="0" cellpadding="7">
<tbody>
<tr valign="bottom">
<td width="60" height="11">
<p class="western" lang="en-US" align="center"><strong>Sr. No.</strong></p>
</td>
<td width="215">
<p class="western" lang="en-US" align="center"><strong>Audit element in prescription</strong></p>
</td>
<td width="66">
<p class="western" lang="en-US" align="center"><strong>Aug</strong></p>
</td>
<td width="61">
<p class="western" lang="en-US" align="center"><strong>Sep</strong></p>
</td>
<td width="61">
<p class="western" lang="en-US" align="center"><strong>Oct</strong></p>
</td>
<td width="61">
<p class="western" lang="en-US" align="center"><strong>Nov</strong></p>
</td>
</tr>
<tr>
<td valign="bottom" width="60" height="12">
<p class="western" lang="en-US" align="center">1</p>
</td>
<td width="215">
<p class="western" lang="en-US" align="center">Patient Name</p>
</td>
<td width="66">
<p class="western" lang="en-US" align="center">95.43</p>
</td>
<td width="61">
<p class="western" lang="en-US" align="center">97.9</p>
</td>
<td width="61">
<p class="western" lang="en-US" align="center">99.41</p>
</td>
<td valign="bottom" width="61">
<p class="western" lang="en-US" align="center">100</p>
</td>
</tr>
<tr>
<td valign="bottom" width="60" height="39">
<p class="western" lang="en-US" align="center">2</p>
</td>
<td width="215">
<p class="western" lang="en-US" align="center">Medication written in CAPS &amp; Legible</p>
</td>
<td width="66">
<p class="western" lang="en-US" align="center">84.76</p>
</td>
<td width="61">
<p class="western" lang="en-US" align="center">91.89</p>
</td>
<td width="61">
<p class="western" lang="en-US" align="center">93.47</p>
</td>
<td valign="bottom" width="61">
<p class="western" lang="en-US" align="center">96.88</p>
</td>
</tr>
<tr>
<td valign="bottom" width="60" height="12">
<p class="western" lang="en-US" align="center">3</p>
</td>
<td width="215">
<p class="western" lang="en-US" align="center">Dose</p>
</td>
<td width="66">
<p class="western" lang="en-US" align="center">92.99</p>
</td>
<td width="61">
<p class="western" lang="en-US" align="center">94.89</p>
</td>
<td width="61">
<p class="western" lang="en-US" align="center">97.33</p>
</td>
<td valign="bottom" width="61">
<p class="western" lang="en-US" align="center">98.08</p>
</td>
</tr>
<tr>
<td valign="bottom" width="60" height="12">
<p class="western" lang="en-US" align="center">4</p>
</td>
<td width="215">
<p class="western" lang="en-US" align="center">Quantity</p>
</td>
<td width="66">
<p class="western" lang="en-US" align="center">96.04</p>
</td>
<td width="61">
<p class="western" lang="en-US" align="center">95.8</p>
</td>
<td width="61">
<p class="western" lang="en-US" align="center">98.52</p>
</td>
<td valign="bottom" width="61">
<p class="western" lang="en-US" align="center">98.44</p>
</td>
</tr>
<tr>
<td valign="bottom" width="60" height="12">
<p class="western" lang="en-US" align="center">5</p>
</td>
<td width="215">
<p class="western" lang="en-US" align="center">Date of prescription</p>
</td>
<td width="66">
<p class="western" lang="en-US" align="center">92.38</p>
</td>
<td width="61">
<p class="western" lang="en-US" align="center">94.29</p>
</td>
<td width="61">
<p class="western" lang="en-US" align="center">99.11</p>
</td>
<td valign="bottom" width="61">
<p class="western" lang="en-US" align="center">99.61</p>
</td>
</tr>
<tr>
<td valign="bottom" width="60" height="12">
<p class="western" lang="en-US" align="center">6</p>
</td>
<td width="215">
<p class="western" lang="en-US" align="center">High risk medication verified</p>
</td>
<td width="66">
<p class="western" lang="en-US" align="center">98.17</p>
</td>
<td width="61">
<p class="western" lang="en-US" align="center">99.4</p>
</td>
<td width="61">
<p class="western" lang="en-US" align="center">100</p>
</td>
<td valign="bottom" width="61">
<p class="western" lang="en-US" align="center">100</p>
</td>
</tr>
<tr>
<td valign="bottom" width="60" height="11">
<p class="western" lang="en-US" align="center">7</p>
</td>
<td width="215">
<p class="western" lang="en-US" align="center">Signature of Doctor</p>
</td>
<td width="66">
<p class="western" lang="en-US" align="center">93.6</p>
</td>
<td width="61">
<p class="western" lang="en-US" align="center">98.2</p>
</td>
<td width="61">
<p class="western" lang="en-US" align="center">98.81</p>
</td>
<td valign="bottom" width="61">
<p class="western" lang="en-US" align="center">100</p>
</td>
</tr>
</tbody>
</table>
<p class="western" lang="en-US">&nbsp;</p>';
echo "</body>";
echo "</html>";
?>