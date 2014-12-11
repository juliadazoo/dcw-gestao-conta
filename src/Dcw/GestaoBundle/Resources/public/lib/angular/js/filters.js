app.filter('markdown', function($sce) {
    var converter = new Showdown.converter();

    return function(input) {
        var html = converter.makeHtml(input || '');

        return html;
    }
});

app.filter('trust', function($sce) {
    return function(input) {
        var html = $sce.trustAsHtml(input || '');
        return html;
    }
});
