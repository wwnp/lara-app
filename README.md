pagination to: posts, comments, new comments
when add comment to post, auto title to admin and highlight it
when add comment to post, auto title to author and highlight it if post belongs to author
posts.show  add written author and created date and updated date if exists
limit comment number to 5 from 1 user; and 30 in all
* auto scroll loading comments
make admin posts.index in table structure
translation to rus , everything
html tags in content textarea +-
sort in posts.index by newest to oldest

singup - email , login after
change password in profile
verification email
rate limiter login
additional password for super private actions( delete account for example )


POSTS
admin
    index
    create
    store
    edit
    update
    destroy
    show
    slug
------------------------------
author
    index
    create 
    store 
    edit (own only by id)
    update (own only by id)
    destroy (own only by id)
    index   
    show
    slug
-------------------------------
guest
    index   
    show
    slug 


make notification fixed like toast bootstrap