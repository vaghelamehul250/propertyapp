@extends('layout')

@section('title', 'Add Property')

@section('content')

    <form action="{{ route("property_store") }}" method="POST" id="property_store_form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="property_name">Property Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Property Name" required>
        </div>
        <div class="form-group">
            <label for="property_detail">Property Detail</label>
            <textarea class="form-control" id="description" name="description" placeholder="Enter Property Detail" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="property_type">Property Type</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="type" value="residential" required checked>
                <label class="form-check-label" for="property_type">Residential</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="type" value="commercial" required>
                <label class="form-check-label" for="property_type">Commercial</label>
            </div>
        </div>
        <div class="form-group" id="residential">
            <label for="property_size">Property Size</label>
            <select class="form-control" name="size" id="size" required>
                <option>Select Property Size</option>
                <option value="2bhk">2 BHK</option>
                <option value="3bhk">3 BHK</option>
            </select>
        </div>
        <div class="form-group">
            <label for="property_owner">Property Owner</label>
            <select class="form-control" name="property_owner_id" id="property_owner_id" required>
                <option>Select Property Owner</option>
                <?php
                    if (count($data['get_owner']) > 0) {
                        foreach ($data['get_owner'] as $key => $owner) {
                            echo "<option value='".$owner['id']."'>".$owner['name']."</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="property_aminities">Property Amenities</label>
            <?php
                if (count($data['aminities']) > 0) {
                    foreach ($data['aminities'] as $key => $aminity) { ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="property_aminities[]" id="property_aminities" value="{{$aminity['id']}}">
                            <label class="form-check-label" for="property_aminities">{{$aminity['name']}}</label>
                        </div>
                    <?php }
                }
            ?>
        </div>
        <div class="form-group">
            <label for="property_address">Property Address</label>
            <textarea class="form-control" id="property_address" placeholder="Enter Property Address" rows="3" id="property_aminities" value="{{$aminity['id']}}" name="address" id="address" required></textarea>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="property_brochure_file" name="brochure" id="brochure" required>
            <label class="custom-file-label" for="property_brochure_file">Choose Property Brochure file</label>
        </div>

        <div class="custom-file">
            <input type="file" class="custom-file-input" id="property_property" name="photos[]" id="photos" multiple required>
            <label class="custom-file-label" for="property_property">Choose Property Photos</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#property_store_form").validate();
            $('input[name="type"]').change(function(){
                if($(this).val() == "residential") {
                    $('#residential').removeClass('hide')
                } else {
                    $('#residential').addClass('hide')
                }
            })
        });
    </script>
@stop
