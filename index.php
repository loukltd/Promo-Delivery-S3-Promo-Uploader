<?php

session_start();

include "../iCPv2/conf/encap.php";

$GLOBALS["___mysqli_ston"] = mysqli_connect($DBServer, $DBUser, $DBPass);
(bool) mysqli_query($GLOBALS["___mysqli_ston"], "USE $DBName");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Promo Generator">
    <meta name="author" content="Promo Delivery">
    <title>Promo Delivery - Promo Generator</title>

    <!-- Bootstrap CSS -->
    <link href="../ajax5/css/bootstrap.min.css" rel="stylesheet" />
    <!-- BootstrapValidator CSS -->
    <link href="../ajax5/css/bootstrapValidator.min.css" rel="stylesheet"/>

    <style type="text/css">
        body {
            background-color:#232323;
            background-image: url("https://www.promodelivery.co.uk/dashnu/img/dark_matter.png");
            font-family: 'Roboto', sans-serif; 
            font-weight: 300; 
            padding: 0;
            margin: 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
            background-color: #232323;
            opacity: 1;
        }
        .browse-btn {
            background-color: #CCC;
            color: #000;
        }
        .browse-btn input[type=file] {
            opacity: 0;
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="panel panel-default">
            <img src="img/Background-logo_campainCreator.jpg" class="img-responsive" >
            <div class="panel-body">
                <form id="registration-form" method="POST" class="form-horizontal">
                    <div class="left-side col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <!-- Artist Input -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="artist">Artist</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="artist" name="artist" placeholder="Enter Artist" />
                            </div>
                        </div>
                        <!-- Title Input -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="title">Title</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" />
                            </div>
                        </div>
                        <!-- Record Label Dropdown -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="label">Record Label</label>
                            <div class="col-md-8">
                                <select class="form-control" id="label" name="label" placeholder="Choose Label">
                                    <option value="">Choose Label</option>
                                <?php
                                ($result3 = mysqli_query(
                                    $GLOBALS["___mysqli_ston"],
                                    "select label_name from labeldata order by label_name ASC"
                                )) or
                                    die(
                                        "Error: " .
                                            (is_object(
                                                $GLOBALS["___mysqli_ston"]
                                            )
                                                ? mysqli_error(
                                                    $GLOBALS["___mysqli_ston"]
                                                )
                                                : (($___mysqli_res = mysqli_connect_error())
                                                    ? $___mysqli_res
                                                    : false)) .
                                            " with query " .
                                            mysqli_query
                                    );
                                while ($row3 = mysqli_fetch_array($result3)) {
                                    $namee3 = $row3["label_name"];

                                    echo "<option>" . $namee3 . "</option>";
                                    $phptojava1 .=
                                        "<option>" . $namee3 . "</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <!-- Catalogue Number Input -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="catno">Cat. No</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="catno" name="catno" placeholder="Enter Catalogue Number" />
                            </div>
                        </div>
                        <!-- Tracks Input -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="tracks">Tracks</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="tracks" name="tracks" placeholder="Enter Number Of Tracks" />
                            </div>
                        </div>
                        <!-- Campaign Genre Dropdown -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="genre">Campaign Genre</label>
                            <div class="col-md-8">
                                <select class="form-control" id="genre" name="genre" placeholder="Choose Genre">
                                    <option value="">Choose Genre</option>
                                <?php
                                ($result2 = mysqli_query(
                                    $GLOBALS["___mysqli_ston"],
                                    "select distinct genre_name from genredata order by genre_name ASC"
                                )) or
                                    die(
                                        "Error: " .
                                            (is_object(
                                                $GLOBALS["___mysqli_ston"]
                                            )
                                                ? mysqli_error(
                                                    $GLOBALS["___mysqli_ston"]
                                                )
                                                : (($___mysqli_res = mysqli_connect_error())
                                                    ? $___mysqli_res
                                                    : false)) .
                                            " with query " .
                                            mysqli_query
                                    );
                                while ($row2 = mysqli_fetch_array($result2)) {
                                    $nameer = $row2["genre_name"];

                                    echo "<option>" . $nameer . "</option>";
                                    $phptojava2 .=
                                        "<option>" . $nameer . "</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <!-- Release Description Input -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="description">Release Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control inset-bottom" id="description" name="description" placeholder="Enter Description" rows="4"></textarea>
                            </div>
                        </div>
<!-- Promo Send Date Input -->
<div class="form-group">
    <label class="col-md-4 control-label" for="promo-send-date">Campaign Send Date</label>
    <div class="col-md-8">
        <input type="text" class="form-control" id="promo-send-date" name="promo-send-date" placeholder="Select Campaign Send Date" />
    </div>
</div>

<!-- Promo Expiry Date -->
<div class="form-group">
    <label class="col-md-4 control-label" for="promo-expiry-date">Campaign Expiry Date</label>
    <div class="col-md-8">
        <span id="promo-expiry-date"></span>
    </div>
</div>
                        <!-- Artwork File Select -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="artwork">Artwork</label>
                            <div class="col-md-8">
                                <label class="browse-btn">
                                    Select Artwork&hellip; 
                                    <input type="file" id="artwork-file-input" name="artwork-file-input" accept="image/*" class="form-control-file">
                                </label>
                                <div id="selected-artwork-file"></div>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <!-- Confirmation Message -->
                        <div id="confirmation" class="alert alert-success hidden">
                            <span class="glyphicon glyphicon-star"></span> Thank you for registering
                        </div>
                    </div>
                    <!-- Tracks Input Fields Container -->
                    <div id="tracks-container" class="right-side col-lg-6 col-md-6 hidden-xs hidden-sm hidden">
                        <!-- Tracks will be dynamically added here -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="../ajax5/js/jquery.min.js"></script>
    <script src="../ajax5/js/bootstrap.min.js"></script>
    <script src="js/cleanclipboard.js"></script>
    <!-- Include jQuery UI from CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    
    <!-- BootstrapValidator -->
    <script src="../ajax5/js/bootstrapValidator.min.js"></script>
    
    <script>
        $(document).ready(function () {
            // Add event listener to Release Description field
            $('#description').on('input', function () {
                // Get the current value of the field
                var description = $(this).val();
                // Clean the value using the cleanWordClipboard function
                var cleanedDescription = cleanWordClipboard(description);
                // Update the field with the cleaned value
                $(this).val(cleanedDescription);
            });

   // Initialize datepicker for promo send date
    $('#promo-send-date').datepicker({
        dateFormat: 'dd/mm/yy',
        startDate: 'today',
        endDate: '+4w',
        minDate: 0, // Set minimum date to today (disable past dates)
        autoclose: true
    });
  // Function to add leading zero to single-digit numbers
        function addLeadingZero(num) {
            return (num < 10 ? '0' : '') + num;
        }

        // Event handler for promo send date change
        $('#promo-send-date').change(function() {
            // Get selected date
            var selectedDate = $(this).datepicker('getDate');
            if (selectedDate) {
                // Calculate promo expiry date
                var promoExpiryDate = new Date(selectedDate);
                promoExpiryDate.setDate(promoExpiryDate.getDate() + 42); // Add 6 weeks (42 days)
                // Format promo expiry date as DD/MM/YYYY with leading zeros
                var formattedExpiryDate = addLeadingZero(promoExpiryDate.getDate()) + '/' + addLeadingZero(promoExpiryDate.getMonth() + 1) + '/' + promoExpiryDate.getFullYear();
                // Display promo expiry date
                $('#promo-expiry-date').text(formattedExpiryDate);
            }
        });

                        // Handle tracks input change event
            $('#tracks').on('input', function () {
                var tracks = parseInt($(this).val());
                var tracksContainer = $('#tracks-container');
                tracksContainer.empty(); // Clear previous tracks

                if (tracks > 0 && tracks <= 25) {
                    for (var i = 0; i < tracks; i++) {
                        var trackNumber = i + 1;
                        var trackFields = `
                            <div class="form-group">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="artist${trackNumber}" name="artist${trackNumber}" placeholder="${trackNumber} Artist" />
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title${trackNumber}" name="title${trackNumber}" placeholder="${trackNumber} Title" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="mix${trackNumber}" name="mix${trackNumber}" placeholder="${trackNumber} Mix" />
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" id="genre${trackNumber}" name="genre${trackNumber}">
                                        <?php echo $phptojava2; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="browse-btn">
                                        Select Track&hellip; 
                                        <input type="file" id="audioFile${trackNumber}" name="audioFile${trackNumber}" accept=".wav">
                                    </label>
                                    <div class="selected-audio-file"></div>
                                </div>
                            </div>
                        `;
                        tracksContainer.append(trackFields);
                    }
                    tracksContainer.removeClass('hidden');
                } else {
                    tracksContainer.addClass('hidden');
                }
            });

            // Display selected filename for artwork file input
            $('#artwork-file-input').on('change', function () {
                var fileName = $(this).val().split('\\').pop();
                $('#selected-artwork-file').text(fileName);
            });

            // Display selected filename for audio file inputs
            $(document).on('change', 'input[type="file"]', function() {
                var fileName = $(this).val().split('\\').pop();
                $(this).closest('.form-group').find('.selected-audio-file').text(fileName);
            });

            // Form validation
            var validator = $("#registration-form").bootstrapValidator({
                feedbackIcons: {
                    valid: "glyphicon glyphicon-ok",
                    invalid: "glyphicon glyphicon-remove", 
                    validating: "glyphicon glyphicon-refresh"
                }, 
                fields: {
                    artist: {
                        validators: {
                            notEmpty: {
                                message: "Please enter a valid Artist name."
                            }, 
                            stringLength: {
                                min: 2, 
                                max: 150,
                                message: "Artist name must be between 2 and 150 characters long"
                            },
                        }
                    }, 
                    title: {
                        validators: {
                            notEmpty: {
                                message: "Campaign title is required."
                            },
                            stringLength: {
                                min: 2,
                                message: "Campaign title must be longer."
                            }, 
                        }
                    }, 
                    catno: {
                        validators: {
                            notEmpty: {
                                message: "Catalogue Number is required."
                            },
                            stringLength: {
                                min: 2,
                                message: "Catalogue Number must be longer."
                            }, 
                        }
                    }, 
                    tracks: {
                        validators: {
                            integer: {
                                message: 'A valid number must be entered.'
                            },
                            between: {
                                min: 1,
                                max: 25,
                                message: 'No more than 25 tracks each campaign.'
                            },                      
                            notEmpty: {
                                message: "The number of tracks must be entered."
                            } 
                        }
                    },
                    label: {
                        validators: {
                            notEmpty: {
                                message: "Record Label is required"
                            }
                        }
                    },
                    genre: {
                        validators: {
                            notEmpty: {
                                message: "Campaign Genre is required"
                            }
                        }
                    },
                    artwork: {
                        validators: {
                            notEmpty: {
                                message: "Artwork file is required"
                            }
                        }
                    },
                    description: {
                        validators: {
                            notEmpty: {
                                message: "Campaign Description is required."
                            }
                        }
                    }
                }
            });

            validator.on("success.form.bv", function (e) {
                // Prevent form submission
                e.preventDefault();
                // Display confirmation message
                $("#registration-form").addClass("hidden");
                $("#confirmation").removeClass("hidden");
            });
        });
        </script>
