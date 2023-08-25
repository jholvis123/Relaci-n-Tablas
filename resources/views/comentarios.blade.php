<!DOCTYPE html>
<html>
<head>
    <title>Lista de Comentarios</title>
</head>
<body>
    <h1>Lista de Comentarios</h1>
    
    <ul>
        @foreach ($comments as $comment)
            <li>
                <strong>Comentario ID:</strong> {{ $comment->id }}<br>
                <strong>Publicación ID:</strong> {{ $comment->post_id }}<br>
                <strong>Comentario:</strong> {{ $comment->comment }}<br>
                <strong>Creado:</strong> {{ $comment->created_at }}<br>
                <strong>Actualizado:</strong> {{ $comment->updated_at }}
                <br>
            </li>
        @endforeach
    </ul>

    <h2>Editar Comentario</h2>
    @foreach ($comments as $comment)
    <form method="post" action="{{ route('ActualizarComentario', ['commentId' => $comment->id]) }}">
        @csrf
        <label for="edited_comment">Nuevo Comentario:</label><br>
        <textarea name="edited_comment" id="edited_comment" cols="30" rows="4">{{ $comment->comment }}</textarea><br>
        <button type="submit">Actualizar Comentario</button>
    </form>
@endforeach


</body>
</html>

