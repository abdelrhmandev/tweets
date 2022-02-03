<div class="sidebar">
  <i class="fab fa-twitter"></i>
  <div class="sidebarOption active">
    <span class="material-icons"> home </span>
    <h2><a href="{{ route('tweets.index')}}">Home</a></h2>
  </div>

  <div class="sidebarOption">
    <span class="material-icons"> search </span>
    <h2><a href="{{ route('explore')}}">Explore</a></h2>
  </div>

 
 

 

  <div class="sidebarOption">
    <span class="material-icons"> perm_identity </span>
    <h2><a href="{{ route('profile.edit')}}">Profile</a></h2>
  </div>


  <div class="sidebarOption">
    <span class="material-icons"> perm_identity </span>
    <h2>
      <form method="POST" action="/logout">
        @csrf
       <button type="submit" class="btn btn-warning btn-icon">LogOut</button>
    </form>
          
    
    </h2>
  </div>


 
</div>