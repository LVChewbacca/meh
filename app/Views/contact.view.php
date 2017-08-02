{% include 'header.php' %}

<h2>Contact Us</h2>

<form name="contactForm" method="post" action="">
    <div class="col-sm-6" style="display: flex; flex-direction: column">
        <label for="username">Username</label>
        <input id="username" name="username">

        <label for="uemail">Email</label>
        <input id="uemail" name="umail">

    </div>
    <div class="col-sm-6">
        <label for="comment">Comment</label>
        <textarea name="comment" id="comment" cols="30" rows="7"></textarea>

        <input type="submit" value="Submit">
    </div>
</form>

{% include 'footer.php' %}
