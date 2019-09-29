<form method="POST" action="{{ route('store') }}" id="id-form_messages">
    @csrf
    <div class="form-group">
        <label for="name">Name: *</label>
        <input class="form-control" placeholder="Name" name="name" type="text" id="name" required>
    </div>

    <div class="form-group">
        <label for="email">E-mail: *</label>
        <input class="form-control" placeholder="E-mail" name="email" type="email" id="email" required>
    </div>

    <div class="form-group">
        <label for="message">Comment: *</label>
        <textarea class="form-control" rows="5" placeholder="Text" name="message" cols="50"
                  id="message" required></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Add">
    </div>
</form>
