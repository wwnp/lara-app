@props([
    'title'
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <x-alert msg="ALERT MSG"/>
    <header>
        <div class="container">
            header
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col col-12 col-md-3">
                    <ul class="nav flex-column nav-pills">
                        <x-navlink routeName="categories.index">
                            Categories
                        </x-navlink>
                        <x-navlink routeName="posts.index" >
                            Posts
                        </x-navlink>
                        <x-navlink routeName="categories.trash">
                            Trash
                        </x-navlink>
                        <x-navlink routeName="home">
                            Home
                        </x-navlink>
                        <x-navlink routeName="categories.create">
                            Create category
                        </x-navlink>
                        <x-navlink routeName="posts.create">
                            Create post
                        </x-navlink>
                        <x-navlink routeName="goods.create">
                            Create good
                        </x-navlink>
                    </ul>

                </div>
                <div class="col col-12 col-md-9">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            footer
        </div>
    </footer>
</body>
</html>

