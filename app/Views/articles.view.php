{% set name = 'Category' %}
{% include 'header.php' %}

<ul>
    {% for new in articles %}
    <li><a href="/articles/{{new.article_id}}">{{ new.title }}</a> |
        <small><i>{{ new.author }} | {{ new.created_at|time_diff }}</i></small>
    </li>

    <p>{{ new.body|length > 200 ? new.body|slice(0, 200) ~ '...' : new.body }}</p>
    {% endfor %}
</ul>

{% include 'footer.php' %}
