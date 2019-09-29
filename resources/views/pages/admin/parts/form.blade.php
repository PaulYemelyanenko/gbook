<form method="POST" action="{{ route('admin.answer', ['id' => $message->id]) }}" id="id-form_messages">
    @csrf
    <div class="form-group">
        <label for="message">Comment: *</label>
        <textarea class="form-control" rows="5" placeholder="Text" name="answer" cols="50"
                  id="message" required></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-info" type="submit" value="Answer">
        <a href="{{ route('delete', ['id' => $message->id]) }}" class="btn btn-danger">
            Delete
            <i class="glyphicon glyphicon-trash"></i>
        </a>
    </div>
</form>
