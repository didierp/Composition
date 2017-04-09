<!DOCTYPE html>
<html>
<head>
    <title>Chemical composition resolution</title>
    <link rel="stylesheet" href="style.css" />
    <script type="application/javascript" src="bower_components/jquery/jquery.min.js"></script>
</head>
<body>
<table width="100%">
    <tr>
        <td width="50%">
        <table>
        <tr><td><label>Carbon: </label></td><td><input type="number" min="1" name="carbon_count" value="1" /></td></tr>
        <tr><td><label>Hydrogen: </label></td><td><input min="2" type="number" name="hydrogen_count" value="2" /></td></tr>
        <tr><td><label>Oxygen: </label></td><td><input min="0" type="number" name="oxygen_count" value="0" /></td></tr>
		<tr><td colspan="2">
			<div><input type="button" name="compute" id="compute" value="Compute" /></div>
        </td></tr>
        </table>
        </td>
        <td width="50%">
            <div class="result">
                <div class="search" style="display: none;"><span>Search...</span></div>
                <div class="possible" style="display: none;"><span>Possible: </span><span id="possible"></span></div>
                <div class="count" style="display: none;"><span>Finded solutions: </span><span id="count"></span></div>
                <div class="insaturation" style="display: none;"><span>Insaturations: </span><span id="insaturation"></span></div>
                <div class="ms" style="display: none;"><span>Execution time: </span><span id="ms"></span></div>
                <br/>
            </div>
        </td>
    </tr>
    <tr><td><div id="content"><div></td></tr>
</table>
<script type="application/javascript" src="resolve.js"></script>
</body>
</html>
