window.addEventListener('DOMContentLoaded', (event) => {
    loadPosts();
    var lastScrollTop = 0;
    //try loading more posts if more-posts-loader is in view on scroll down
    window.addEventListener('scroll', (event) => {
        var st = $(this).scrollTop();
        if (st > lastScrollTop){
            if(document.querySelector('#more-posts-loader')){
                if(document.querySelector('#more-posts-loader').getBoundingClientRect().top < window.innerHeight){
                    //if page is not on last page
                    if(document.body.dataset.page < document.body.dataset.last_page){
                        loadPosts();
                    }
                }
            }
        }
        lastScrollTop = st;
    });

        
});

function loadPosts(){
    //call load_more_posts
    try {
        jQuery.ajax({
          type: "post",
          url: document.body.dataset.ajax_url,
          data: {
            action:'load_posts',
            page: document.body.dataset.page ,
            search: ""
          },
          error:function (msg) {
           console.log(msg);
          },
          success: function(msg){
            document.querySelector('#blog-post-container').innerHTML += msg;
            var winDow = $(window);
          },
          complete: function(data) {
          }
      });   
        
      } catch (error) {
        console.log(error)
      } finally{
        document.body.dataset.page = parseInt(document.body.dataset.page) + 1;
      }
}