class CreateLineTable < ActiveRecord::Migration
  def up
    create_table :yd_lines do |t|
      t.integer :event_id
      t.integer :user_id
      t.datetime :begin_at
      t.datetime :group_begin_at
      t.string :group_address
      t.text :detail
      t.float :cost
      t.string :transport
      t.string :building
      t.text :note
      t.string :username
      t.string :phone
      t.string :email
      t.timestamps
    end
    add_index :yd_lines, :user_id
    add_index :yd_lines, :event_id
  end

  def down
    drop_table :yd_lines
  end
end
