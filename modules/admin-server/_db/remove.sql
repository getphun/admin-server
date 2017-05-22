DELETE FROM `user_perms_chain` WHERE `user_perms` IN (
    SELECT `id` FROM `user_perms` WHERE `name` = 'read_server'
);

DELETE FROM `user_perms` WHERE `name` = 'read_server';