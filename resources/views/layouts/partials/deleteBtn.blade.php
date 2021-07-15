    <form action="{{ route('user.posts.destroy', $post->id) }}" method="post" class="areUsure">
        @csrf
      
        @method('DELETE')
      
        <input type="submit"class="btn btn-primary"  value="Delete">

      </form>