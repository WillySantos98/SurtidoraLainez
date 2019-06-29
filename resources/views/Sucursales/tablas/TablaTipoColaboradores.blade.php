<div class="collapse" id="collapse-tipocolaboradores">
    <div class="card-body">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
            </tr>
            </thead>
            <tbody>
            @foreach($TColaboradores as $tc)
                <tr>
                    <td>{{$tc->id}}</td>
                    <td>{{$tc->nombre}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
