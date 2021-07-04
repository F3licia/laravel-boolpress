    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
        @csrf
      
        @method('DELETE')
      
        <input type="submit" value="Delete"> {{--submit dove? Al macero--}}
      </form>