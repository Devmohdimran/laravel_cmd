<?php

// ~~~~~~~~~ redirect ~~~~~~~~~~~~~~
return redirect('/school-register');

// ~~~~~~~~~ validation ~~~~~~~~~~~~
$validatedData = $request->validate([
            'school_name'    => 'required',
            'school_code'    => 'required',
            'school_mail'   => 'required|email',
            'school_phone'   => 'required',
            'school_address' => 'required'
        ]);

// ~~~~~~~~~~~~ code for insert ~~~~~~~
 $SchoolRecord = new SchoolRecord();
        $SchoolRecord->school_name    = $request->school_name;
        $SchoolRecord->school_address = $request->school_address;
        $SchoolRecord->school_mobile_no = $request->school_phone;
        $SchoolRecord->school_mail = $request->school_mail;
        $SchoolRecord->school_code = $request->school_code;
        $SchoolRecord->school_id = $request->school_id;
        $SchoolRecord->school_status = $request->school_status;
        $SchoolRecord->save();

// ~~~~~~~~~~~ create table ~~~~~~~~~~~~~
Schema::create('school_records', function (Blueprint $table) {
            $table->id();
            $table->string('school_name', 500);
            $table->text('school_address');
            $table->string('school_mobile_no', 12)->nullable();
            $table->string('school_mail', 100)->nullable();
            $table->string('school_code', 100)->nullable();
            $table->string('school_id', 100)->nullable();
            $table->enum('school_status',['0','1'])->default('0');
            $table->timestamps();
        });

// ~~~~~~~~~ how to validate form field ~~~~~~~~~~~~~~~`
<input type="text" class="form-control" name="school_name" placeholder="School Name *" value="{{old('school_name')}}" />
{!! $errors->first('school_name', '<label class="error text-danger">:message</label>') !!}

php artisan config:Cache

// database command
php artisan make:migration create_tablename_table
php artisan migrate
php artisan migrate:rollback // delete table
php artisan migrate:refresh // delete atable and insert all tables
php artisan make:migration add_columns_to_tableName_table // new migrate create with up and doun function
$table->string('col_name', 50)->nullable()->after('col_name');

// create model (first letter of model should be in capital letter)
php artisan make:model Modelname
// create model with migration
php artisan make:model Modelname --migration
