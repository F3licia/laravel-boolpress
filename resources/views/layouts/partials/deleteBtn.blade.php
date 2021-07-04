    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
        @csrf
      
        @method('DELETE')
      
        <input type="submit"class="btn btn-primary"  value="Delete">

      </form>