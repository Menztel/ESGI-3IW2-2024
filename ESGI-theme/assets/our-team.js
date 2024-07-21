wp.customize('number_of_team_members', function(value) {
    value.bind(function(newval) {
        for (let i = 1; i <= 20; i++) {
            if (i <= newval) {
                wp.customize.control('team_member_' + i + '_name').container.show();
                wp.customize.control('team_member_' + i + '_role').container.show();
                wp.customize.control('team_member_' + i + '_phone').container.show();
                wp.customize.control('team_member_' + i + '_email').container.show();
                wp.customize.control('team_member_' + i + '_photo').container.show();
            } else {
                wp.customize.control('team_member_' + i + '_name').container.hide();
                wp.customize.control('team_member_' + i + '_role').container.hide();
                wp.customize.control('team_member_' + i + '_phone').container.hide();
                wp.customize.control('team_member_' + i + '_email').container.hide();
                wp.customize.control('team_member_' + i + '_photo').container.hide();
            }
        }
    });
});
