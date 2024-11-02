<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <h1 class="mb-4">Search Articles</h1>

    <!-- Search Form -->
    <form action="javascript:void(0);" class="d-flex mb-4">
        <input type="text" id="search-input" class="form-control me-2" placeholder="Search for articles..." onkeyup="performSearch()" autocomplete="off">
    </form>

    <!-- Search Results -->
    <div id="search-results" class="list-group"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function performSearch() {
        let query = $('#search-input').val();

        if (query.length > 0) {
            $.ajax({
                url: "{{ route('ajax.search') }}",
                type: 'GET',
                data: { query: query },
                success: function(articles) {
                    $('#search-results').empty();

                    if (articles.length > 0) {
                        articles.forEach(article => {
                            $('#search-results').append(`
                                <a href="/articles/${article.id}" class="list-group-item list-group-item-action">
                                    <h5 class="mb-1">${article.title}</h5>
                                    <p class="mb-1">${article.content.substring(0, 100)}...</p>
                                </a>
                            `);
                        });
                    } else {
                        $('#search-results').append('<p class="text-muted">No articles found.</p>');
                    }
                }
            });
        } else {
            $('#search-results').empty();
        }
    }
</script>

</body>
</html>
