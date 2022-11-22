<div class="usernav">
 
    <ul> <!-- Ensure there are no enter escape characters.-->
        <li><a href="profile.php">Update Profile</a></li><li><a href="group.php">Group Chat</a></li><li><a href="home.php">Home</a></li><li><a href="posts.php">Admin Posts</a></li><li><a href="logout.php">Log Out</a></li>
    </ul>
    <div class="globalsearch">
        <form method="get" action="search.php" onsubmit="return validateField()"> <!-- Ensure there are no enter escape characters.-->
            <select name="location">
                <option value="emails">Emails</option>
                <option value="names">Names</option>
                <option value="hometowns">Hometowns</option>
                <option value="posts">Posts</option>
            </select><input type="text" placeholder="Search" name="query" id="query"><input type="submit" value="Search" id="querybutton">
        </form>
    </div>
</div>

<script>
function validateField(){
    var query = document.getElementById("query");
    var button = document.getElementById("querybutton");
    if(query.value == "") {
        query.placeholder = 'Type something!';
        return false;
    }
    return true;
}
</script>