var lastClickedCategory = null;

function toggleClothes(category) {
    var selectedContainer = document.getElementById(category + '-container');

    if (lastClickedCategory !== null && lastClickedCategory !== category) {
        var lastClickedContainer = document.getElementById(lastClickedCategory + '-container');
        lastClickedContainer.style.display = 'none';
    }

    selectedContainer.style.display = (selectedContainer.style.display === 'none') ? 'flex' : 'none';
    lastClickedCategory = (selectedContainer.style.display === 'none') ? null : category;
}
function submitReview() {
    var username = document.getElementById("username").value;
    var rating = document.getElementById("rating").value;
    var comment = document.getElementById("comment").value;

    // You can use AJAX to send the review data to the server using PHP
    // In this example, I'm just logging the review data to the console
    console.log("Username: " + username);
    console.log("Rating: " + rating);
    console.log("Comment: " + comment);

    // You can further enhance this by sending the data to the server via AJAX and updating the reviews dynamically
}