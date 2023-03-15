pagination to: posts, comments, new comments
when add comment to post, auto title to admin ++++++ and highlight it in comments section
when add comment to post, auto title to author and highlight it if post belongs to author
posts.show  add written author and created date and updated date if exists++++++++++++++++++++++++++

limit comment number to 5 from 1 user; and 30 in all+-
make ui in russian/english language; make swticher button
add tag russian , tag переводы
html tags in content textarea ++++++++++++++++++++ only script tag is restricted 
sort in posts.index by newest to oldest

singup - email , login after+++++++++++++++++++
change password in profile++++++++++++++++
verification email++++++++++++++++++++
rate limiter login
additional password for super private actions( delete account for example )

comments:
autoscroll comments
chaining comments like aboard and highlight it if answer


make notification fixed like toast bootstrap++++++++++++++++++++++++++++++

give role by admin table page;++++++++++++++++++++++++++++++

rf 'зарегестрироваться' to 'стать автором', send email to gmail 

AuthServiceProvider make enum instead of admin author moderator strings

add user_id to posts and setup relations between posts and users; in Post: user() belongsTo(User::class) in User: hasMany(Post::class)\


check if user matches Auth::user() in posts.show in comments section in comments.store

when gates when policies; best case gates-policies

add fnonality search in users, posts

tags videos comments categories users - table

add best manage to admin panel; make admin panel

make logo hoverable with  opacity mb

make controller AuthorBecameRequestController , i can see all people who have appllied form to become author