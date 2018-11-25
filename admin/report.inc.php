<h2>Calculate report for period:</h2>

<form action="displayreport.php" method="post">
    <input type="hidden" name="content" value="quarterly">
    <table>
        <tr>
            <td>
            Enter start date (mm/dd/yyyy):
            </td>
            <td>
                <input type="text" name="startmonth" size="2" placeholder="Month">
                <input type="text" name="startday" size="2" placeholder="Day">
                <input type="text" name="startyear" size="4" placeholder="Year">
            </td>
        </tr>

        <tr>
            <td>
            Enter end date (mm/dd/yyyy):
            </td>
            <td>
                <input type="text" name="endmonth" size="2" placeholder="Month">
                <input type="text" name="endday" size="2" placeholder="Day">
                <input type="text" name="endyear" size="4" placeholder="Year">
            </td>
        </tr>
    </table>
    <input type="submit" name="button" value="Get Report">
</form>