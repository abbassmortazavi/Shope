<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/sweetalert2.min.css">

    </head>
    <body>
    <script src="/js/sweetalert2.min.js"></script>
    @include('sweet::alert')

    <script>
        swal.mixin({
            input: 'text',
            confirmButtonText: 'Next &rarr;',
            showCancelButton: true,
            progressSteps: ['1', '2', '3']
        }).queue([
            {
                title: 'Question 1',
                text: 'Chaining swal2 modals is easy'
            },
            'Question 2',
            'Question 3'
        ]).then((result) => {
            if (result.value) {
                swal({
                    title: 'All done!',
                    html:
                    'Your answers: <pre><code>' +
                    JSON.stringify(result.value) +
                    '</code></pre>',
                    confirmButtonText: 'Lovely!'
                })
            }
        })
    </script>
    </body>
</html>
