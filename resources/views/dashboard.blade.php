<div class="container">
    Bienvenido - {{Auth::user()->first_name}}

<div>
    <form action="{{route('logout')}}" method="POST">

        @csrf
        <div>
            <button type="submit">LOGOUT</button>
        </div>

    </form>

</div>

</div>
