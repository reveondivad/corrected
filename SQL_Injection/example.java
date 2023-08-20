class ApplicationController < ActionController::Base
  protect_from_forgery with: :exception
end

class UsersController < ApplicationController
  def update
    con = Mysql.new 'localhost', 'user', 'pwd'
    name = con.escape_string(params[:name])
    id = con.escape_string(params[:id])
    con.query ""UPDATE users set name = '#{name}' where id = '#{id}'""
    con.close
  end
end