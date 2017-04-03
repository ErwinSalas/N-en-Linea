<div class="container" id="homeContainer">
    <div id="homeLogo">
        <img src={{asset('/images/homeLogo.png')}}>
    </div>
    <div id="menuOptions">
        <h1>Menu Principal</h1>
        <a class="btn btn-success" id="createSessionBtn" role="button">Crear Sesión</a>
        <a class="btn btn-warning" href="#" role="button">Unirse a Sesión</a>
    </div>
</div>

<script>
    $('#createSessionBtn').on('click',function () {
        $.ajax({
            url: 'http://localhost:8000/session',
            type: 'GET',
            success: function(data){
                $("#data_view").html(data);
            }
        });
    });
</script>
