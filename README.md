pagination to: posts, comments, new comments
when add comment to post, auto title to admin ++++++ and highlight it in comments section
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

comments:
autoscroll comments
chaining comments like aboard and highlight it if answer

=====================
admin
edit profile
edit password

create post
edit any post

give role
edit role
approve role
ban user(author, moderator)

create comment
approve/reject comment

[comments.new, comments.index]
=====================
moderator
edit profile
edit password

approve/reject comment
create comment

[comments.new, comments.index]
=====================
author 
edit profile
edit password
logout

create post
edit own post

create comment

=====================
guest
create comment
login
signup
________________________________
create post
edit any post
edit own post
approve/reject'delete post

give role
edit role
approve role
ban user(author, moderator)

approve/reject comment
create comment

login
signup

edit profile

make notification fixed like toast bootstrap

give role by admin table page;

rf 'зарегестрироваться' to 'стать автором', send email to gmail 

AuthServiceProvider make enum instead of admin author moderator strings

add user_id to posts and setup relations between posts and users; in Post: user() belongsTo(User::class) in User: hasMany(Post::class)\


check if user matches Auth::user() in posts.show in comments section in comments.storen\

when gates when policies; best case gates-policies

add fnonality search in users, posts