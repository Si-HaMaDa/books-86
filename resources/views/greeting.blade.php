<html>

<body>

    @isset($name)
        <h1>Hello, Gretting {{ $name }}</h1>
    @else
        <h1>Hello, Please login</h1>
    @endisset

    <h3>{{ $number }}</h3>

    <p>@{{ $number }}</p>

    <p>{{ time() }}</p>
    <p>{{ date('Y-m-d') }}</p>

    <p>{!! $html !!}</p>

    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci inventore impedit, mollitia odio ratione
        deserunt totam, labore rem, perspiciatis iusto laboriosam eius libero saepe eaque unde consequatur repudiandae.
        Deleniti, velit!</p>

    @if (!0)
        <b>Inside If Condition</b>
    @endif

    <script>
        let object = {
            {
                "name": "Ahmed"
            },
            {
                "name": "Ali"
            }
        }
    </script>
</body>

</html>
