# encoding: UTF-8
# This file is auto-generated from the current state of the database. Instead
# of editing this file, please use the migrations feature of Active Record to
# incrementally modify your database, and then regenerate this schema definition.
#
# Note that this schema.rb definition is the authoritative source for your
# database schema. If you need to create the application database on another
# system, you should be using db:schema:load, not running all the migrations
# from scratch. The latter is a flawed and unsustainable approach (the more migrations
# you'll amass, the slower it'll run and the greater likelihood for issues).
#
# It's strongly recommended to check this file into your version control system.

ActiveRecord::Schema.define(:version => 20140410172045) do

  create_table "wp_commentmeta", :primary_key => "meta_id", :force => true do |t|
    t.integer "comment_id", :limit => 8,          :default => 0, :null => false
    t.string  "meta_key"
    t.text    "meta_value", :limit => 2147483647
  end

  add_index "wp_commentmeta", ["comment_id"], :name => "comment_id"
  add_index "wp_commentmeta", ["meta_key"], :name => "meta_key"

  create_table "wp_comments", :primary_key => "comment_ID", :force => true do |t|
    t.integer  "comment_post_ID",      :limit => 8,   :default => 0,   :null => false
    t.text     "comment_author",       :limit => 255,                  :null => false
    t.string   "comment_author_email", :limit => 100, :default => "",  :null => false
    t.string   "comment_author_url",   :limit => 200, :default => "",  :null => false
    t.string   "comment_author_IP",    :limit => 100, :default => "",  :null => false
    t.datetime "comment_date",                                         :null => false
    t.datetime "comment_date_gmt",                                     :null => false
    t.text     "comment_content",                                      :null => false
    t.integer  "comment_karma",                       :default => 0,   :null => false
    t.string   "comment_approved",     :limit => 20,  :default => "1", :null => false
    t.string   "comment_agent",                       :default => "",  :null => false
    t.string   "comment_type",         :limit => 20,  :default => "",  :null => false
    t.integer  "comment_parent",       :limit => 8,   :default => 0,   :null => false
    t.integer  "user_id",              :limit => 8,   :default => 0,   :null => false
  end

  add_index "wp_comments", ["comment_approved", "comment_date_gmt"], :name => "comment_approved_date_gmt"
  add_index "wp_comments", ["comment_date_gmt"], :name => "comment_date_gmt"
  add_index "wp_comments", ["comment_parent"], :name => "comment_parent"
  add_index "wp_comments", ["comment_post_ID"], :name => "comment_post_ID"

  create_table "wp_groups_capability", :primary_key => "capability_id", :force => true do |t|
    t.string "capability",                        :null => false
    t.string "class"
    t.string "object"
    t.string "name",        :limit => 100
    t.text   "description", :limit => 2147483647
  end

  add_index "wp_groups_capability", ["capability", "class", "object"], :name => "capability_kco", :length => {"capability"=>20, "class"=>20, "object"=>20}
  add_index "wp_groups_capability", ["capability"], :name => "capability", :unique => true

  create_table "wp_groups_group", :primary_key => "group_id", :force => true do |t|
    t.integer  "parent_id",   :limit => 8
    t.integer  "creator_id",  :limit => 8
    t.datetime "datetime"
    t.string   "name",        :limit => 100,        :null => false
    t.text     "description", :limit => 2147483647
    t.text     "slogon",      :limit => 2147483647
    t.string   "goal",        :limit => 256
  end

  add_index "wp_groups_group", ["name"], :name => "group_n", :unique => true

  create_table "wp_groups_group_capability", :id => false, :force => true do |t|
    t.integer "group_id",      :limit => 8, :null => false
    t.integer "capability_id", :limit => 8, :null => false
  end

  add_index "wp_groups_group_capability", ["capability_id", "group_id"], :name => "group_capability_cg"

  create_table "wp_groups_user_capability", :id => false, :force => true do |t|
    t.integer "user_id",       :limit => 8, :null => false
    t.integer "capability_id", :limit => 8, :null => false
  end

  add_index "wp_groups_user_capability", ["capability_id", "user_id"], :name => "user_capability_cu"

  create_table "wp_groups_user_group", :id => false, :force => true do |t|
    t.integer "user_id",  :limit => 8, :null => false
    t.integer "group_id", :limit => 8, :null => false
  end

  add_index "wp_groups_user_group", ["group_id", "user_id"], :name => "user_group_gu"

  create_table "wp_links", :primary_key => "link_id", :force => true do |t|
    t.string   "link_url",                             :default => "",  :null => false
    t.string   "link_name",                            :default => "",  :null => false
    t.string   "link_image",                           :default => "",  :null => false
    t.string   "link_target",      :limit => 25,       :default => "",  :null => false
    t.string   "link_description",                     :default => "",  :null => false
    t.string   "link_visible",     :limit => 20,       :default => "Y", :null => false
    t.integer  "link_owner",       :limit => 8,        :default => 1,   :null => false
    t.integer  "link_rating",                          :default => 0,   :null => false
    t.datetime "link_updated",                                          :null => false
    t.string   "link_rel",                             :default => "",  :null => false
    t.text     "link_notes",       :limit => 16777215,                  :null => false
    t.string   "link_rss",                             :default => "",  :null => false
  end

  add_index "wp_links", ["link_visible"], :name => "link_visible"

  create_table "wp_options", :primary_key => "option_id", :force => true do |t|
    t.string "option_name",  :limit => 64,         :default => "",    :null => false
    t.text   "option_value", :limit => 2147483647,                    :null => false
    t.string "autoload",     :limit => 20,         :default => "yes", :null => false
  end

  add_index "wp_options", ["option_name"], :name => "option_name", :unique => true

  create_table "wp_postmeta", :primary_key => "meta_id", :force => true do |t|
    t.integer "post_id",    :limit => 8,          :default => 0, :null => false
    t.string  "meta_key"
    t.text    "meta_value", :limit => 2147483647
  end

  add_index "wp_postmeta", ["meta_key"], :name => "meta_key"
  add_index "wp_postmeta", ["post_id"], :name => "post_id"

  create_table "wp_posts", :primary_key => "ID", :force => true do |t|
    t.integer  "post_author",           :limit => 8,          :default => 0,         :null => false
    t.datetime "post_date",                                                          :null => false
    t.datetime "post_date_gmt",                                                      :null => false
    t.text     "post_content",          :limit => 2147483647,                        :null => false
    t.text     "post_title",                                                         :null => false
    t.text     "post_excerpt",                                                       :null => false
    t.string   "post_status",           :limit => 20,         :default => "publish", :null => false
    t.string   "comment_status",        :limit => 20,         :default => "open",    :null => false
    t.string   "ping_status",           :limit => 20,         :default => "open",    :null => false
    t.string   "post_password",         :limit => 20,         :default => "",        :null => false
    t.string   "post_name",             :limit => 200,        :default => "",        :null => false
    t.text     "to_ping",                                                            :null => false
    t.text     "pinged",                                                             :null => false
    t.datetime "post_modified",                                                      :null => false
    t.datetime "post_modified_gmt",                                                  :null => false
    t.text     "post_content_filtered", :limit => 2147483647,                        :null => false
    t.integer  "post_parent",           :limit => 8,          :default => 0,         :null => false
    t.string   "guid",                                        :default => "",        :null => false
    t.integer  "menu_order",                                  :default => 0,         :null => false
    t.string   "post_type",             :limit => 20,         :default => "post",    :null => false
    t.string   "post_mime_type",        :limit => 100,        :default => "",        :null => false
    t.integer  "comment_count",         :limit => 8,          :default => 0,         :null => false
  end

  add_index "wp_posts", ["post_author"], :name => "post_author"
  add_index "wp_posts", ["post_name"], :name => "post_name"
  add_index "wp_posts", ["post_parent"], :name => "post_parent"
  add_index "wp_posts", ["post_type", "post_status", "post_date", "ID"], :name => "type_status_date"

  create_table "wp_revslider_settings", :force => true do |t|
    t.text "general", :null => false
    t.text "params",  :null => false
  end

  create_table "wp_revslider_sliders", :force => true do |t|
    t.text "title",  :limit => 255, :null => false
    t.text "alias",  :limit => 255
    t.text "params",                :null => false
  end

  create_table "wp_revslider_slides", :force => true do |t|
    t.integer "slider_id",   :null => false
    t.integer "slide_order", :null => false
    t.text    "params",      :null => false
    t.text    "layers",      :null => false
  end

  create_table "wp_rg_form", :force => true do |t|
    t.string   "title",        :limit => 150,                    :null => false
    t.datetime "date_created",                                   :null => false
    t.boolean  "is_active",                   :default => true,  :null => false
    t.boolean  "is_trash",                    :default => false, :null => false
  end

  create_table "wp_rg_form_meta", :primary_key => "form_id", :force => true do |t|
    t.text "display_meta",      :limit => 2147483647
    t.text "entries_grid_meta", :limit => 2147483647
    t.text "confirmations",     :limit => 2147483647
    t.text "notifications",     :limit => 2147483647
  end

  create_table "wp_rg_form_view", :force => true do |t|
    t.integer  "form_id",      :limit => 3,                 :null => false
    t.datetime "date_created",                              :null => false
    t.string   "ip",           :limit => 15
    t.integer  "count",        :limit => 3,  :default => 1, :null => false
  end

  add_index "wp_rg_form_view", ["form_id"], :name => "form_id"

  create_table "wp_rg_lead", :force => true do |t|
    t.integer  "form_id",          :limit => 3,                                                        :null => false
    t.integer  "post_id",          :limit => 8
    t.datetime "date_created",                                                                         :null => false
    t.boolean  "is_starred",                                                     :default => false,    :null => false
    t.boolean  "is_read",                                                        :default => false,    :null => false
    t.string   "ip",               :limit => 39,                                                       :null => false
    t.string   "source_url",       :limit => 200,                                :default => "",       :null => false
    t.string   "user_agent",       :limit => 250,                                :default => "",       :null => false
    t.string   "currency",         :limit => 5
    t.string   "payment_status",   :limit => 15
    t.datetime "payment_date"
    t.decimal  "payment_amount",                  :precision => 19, :scale => 2
    t.string   "transaction_id",   :limit => 50
    t.boolean  "is_fulfilled"
    t.integer  "created_by",       :limit => 8
    t.boolean  "transaction_type"
    t.string   "status",           :limit => 20,                                 :default => "active", :null => false
  end

  add_index "wp_rg_lead", ["form_id"], :name => "form_id"
  add_index "wp_rg_lead", ["status"], :name => "status"

  create_table "wp_rg_lead_detail", :force => true do |t|
    t.integer "lead_id",                     :null => false
    t.integer "form_id",      :limit => 3,   :null => false
    t.float   "field_number",                :null => false
    t.string  "value",        :limit => 200
  end

  add_index "wp_rg_lead_detail", ["form_id"], :name => "form_id"
  add_index "wp_rg_lead_detail", ["lead_id", "field_number"], :name => "lead_field_number"
  add_index "wp_rg_lead_detail", ["lead_id"], :name => "lead_id"

  create_table "wp_rg_lead_detail_long", :primary_key => "lead_detail_id", :force => true do |t|
    t.text "value", :limit => 2147483647
  end

  create_table "wp_rg_lead_meta", :force => true do |t|
    t.integer "lead_id",    :limit => 8,                         :null => false
    t.string  "meta_key"
    t.text    "meta_value", :limit => 2147483647
    t.integer "form_id",    :limit => 3,          :default => 0, :null => false
  end

  add_index "wp_rg_lead_meta", ["form_id", "meta_key"], :name => "form_id_meta_key"
  add_index "wp_rg_lead_meta", ["lead_id"], :name => "lead_id"
  add_index "wp_rg_lead_meta", ["meta_key"], :name => "meta_key"

  create_table "wp_rg_lead_notes", :force => true do |t|
    t.integer  "lead_id",                            :null => false
    t.string   "user_name",    :limit => 250
    t.integer  "user_id",      :limit => 8
    t.datetime "date_created",                       :null => false
    t.text     "value",        :limit => 2147483647
  end

  add_index "wp_rg_lead_notes", ["lead_id", "user_id"], :name => "lead_user_key"
  add_index "wp_rg_lead_notes", ["lead_id"], :name => "lead_id"

  create_table "wp_term_relationships", :id => false, :force => true do |t|
    t.integer "object_id",        :limit => 8, :default => 0, :null => false
    t.integer "term_taxonomy_id", :limit => 8, :default => 0, :null => false
    t.integer "term_order",                    :default => 0, :null => false
  end

  add_index "wp_term_relationships", ["term_taxonomy_id"], :name => "term_taxonomy_id"

  create_table "wp_term_taxonomy", :primary_key => "term_taxonomy_id", :force => true do |t|
    t.integer "term_id",     :limit => 8,          :default => 0,  :null => false
    t.string  "taxonomy",    :limit => 32,         :default => "", :null => false
    t.text    "description", :limit => 2147483647,                 :null => false
    t.integer "parent",      :limit => 8,          :default => 0,  :null => false
    t.integer "count",       :limit => 8,          :default => 0,  :null => false
  end

  add_index "wp_term_taxonomy", ["taxonomy"], :name => "taxonomy"
  add_index "wp_term_taxonomy", ["term_id", "taxonomy"], :name => "term_id_taxonomy", :unique => true

  create_table "wp_terms", :primary_key => "term_id", :force => true do |t|
    t.string  "name",       :limit => 200, :default => "", :null => false
    t.string  "slug",       :limit => 200, :default => "", :null => false
    t.integer "term_group", :limit => 8,   :default => 0,  :null => false
  end

  add_index "wp_terms", ["name"], :name => "name"
  add_index "wp_terms", ["slug"], :name => "slug", :unique => true

  create_table "wp_usermeta", :primary_key => "umeta_id", :force => true do |t|
    t.integer "user_id",    :limit => 8,          :default => 0, :null => false
    t.string  "meta_key"
    t.text    "meta_value", :limit => 2147483647
  end

  add_index "wp_usermeta", ["meta_key"], :name => "meta_key"
  add_index "wp_usermeta", ["user_id"], :name => "user_id"

  create_table "wp_users", :primary_key => "ID", :force => true do |t|
    t.string   "user_login",          :limit => 60,  :default => "", :null => false
    t.string   "user_pass",           :limit => 64,  :default => "", :null => false
    t.string   "user_nicename",       :limit => 50,  :default => "", :null => false
    t.string   "user_email",          :limit => 100, :default => "", :null => false
    t.string   "user_url",            :limit => 100, :default => "", :null => false
    t.datetime "user_registered",                                    :null => false
    t.string   "user_activation_key", :limit => 60,  :default => "", :null => false
    t.integer  "user_status",                        :default => 0,  :null => false
    t.string   "display_name",        :limit => 250, :default => "", :null => false
  end

  add_index "wp_users", ["user_login"], :name => "user_login_key"
  add_index "wp_users", ["user_nicename"], :name => "user_nicename"

  create_table "yd_lines", :force => true do |t|
    t.integer  "event_id"
    t.integer  "user_id"
    t.datetime "begin_at"
    t.datetime "group_begin_at"
    t.string   "group_address"
    t.text     "detail"
    t.float    "cost"
    t.string   "transport"
    t.string   "building"
    t.text     "note"
    t.string   "username"
    t.string   "phone"
    t.string   "email"
    t.datetime "created_at",     :null => false
    t.datetime "updated_at",     :null => false
  end

  add_index "yd_lines", ["event_id"], :name => "index_yd_lines_on_event_id"
  add_index "yd_lines", ["user_id"], :name => "index_yd_lines_on_user_id"

end
