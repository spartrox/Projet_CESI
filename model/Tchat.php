<?php
class Tchat extends Model{
    var $table="tchat_activity inner join member on tchat_activity.id_member = member.id";
}