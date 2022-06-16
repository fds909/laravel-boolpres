<form class="delete-form" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
    data-name="">
  @method('DELETE')
  @csrf

  <button class="btn btn-danger" type="submit">Delete</button>
</form>

@section('scripts')
    <script src="{{ asset('js/deleteConfirmation.js') }}"></script>
@endsection