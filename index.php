<?php
// Include database connection
require_once 'dbConnection.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Registration Page</title>
    <link rel="stylesheet" href="../css/registration.css" />
    <link rel="stylesheet" href="../css/responsive.css" />
    <script src="../js/responsive.js"></script>
    <style>
      .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
        z-index: 1000;
        justify-content: center;
        align-items: center;
      }
      .popup-content {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        text-align: center;
        max-width: 500px;
        width: 90%;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      }
      .popup h3 {
        color: #155724;
        margin-top: 0;
      }
      .popup-btn {
        background-color: #1a73e8;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <header class="header">
      <div class="logo-title">
        <img src="../logo.png" alt="Logo" class="site-logo" />
        <span class="site-name"
          ><h3>
            <span class="highlight-yellow">ISATU </span
            ><span class="highlight-blue">Vehicle Registration System</span>
          </h3></span
        >
      </div>
      <!-- <div class="header-right">
        <a href="login.php" class="login-btn">Login</a>
        <a href="registration.php" class="register-btn">Register Vehicle</a>
      </div> -->
    </header>

    <div class="container">
      <h2><span class="highlight">Vehicle</span> <span>Registration</span></h2>
      <p>
        Please fill out the form completely and upload the required documents.
      </p>

      <form id="registrationForm" method="POST" enctype="multipart/form-data">
        <section>
          <h3>User Information</h3>
          <div class="checkbox-group">
            <label>
              <input type="radio" name="userType" value="student" required />
              Student
            </label>
            <label>
              <input type="radio" name="userType" value="faculty" required />
              Faculty
            </label>
            <label>
              <input type="radio" name="userType" value="non-teaching" required />
              Non-Teaching Personnel
            </label>
          </div>

          <div class="grid-3">
            <div>
              <label>First Name</label>
              <input type="text" name="firstName" placeholder="Enter your first name" required />
            </div>
            <div>
              <label>Last Name</label>
              <input type="text" name="lastName" placeholder="Enter your last name" required />
            </div>
            <div>
              <label>Middle Name</label>
              <input type="text" name="middleName" placeholder="Enter your middle name" />
            </div>
          </div>

          <div class="grid-2">
            <div>
              <label>Email Address</label>
              <input type="email" name="email" placeholder="Enter your email address" required />
            </div>
            <div>
              <label>Contact Number</label>
              <input type="text" name="contactNum" placeholder="Enter your contact number" required />
            </div>
          </div>

          <div class="grid-3">
            <div>
              <label>College</label>
              <select name="college" required>
                <option value="" disabled selected>Select College</option>
                <option value="CAS">(CAS) College of Arts and Sciences</option>
                <option value="CEA">(CEA) College of Engineering and Architecture</option>
                <option value="CCI">(CCI) College of Information and Informatics</option>
                <option value="COE">(COE) College of Education</option>
                <option value="CIT">(CIT) College of Industrial Technology</option>
              </select>
            </div>
            <div id="courseField">
              <label>Course</label>
              <input type="text" name="course" placeholder="Enter your course" required />
            </div>
            <div id="academicYearField">
              <label>Academic Year</label>
              <select name="academicYear" required>
                <option value="" disabled selected>Select Academic Year</option>
                <option value="2025-2026">2025-2026</option>
                <option value="2026-2027">2026-2027</option>
              </select>
            </div>
          </div>

          <div class="grid-3">
            <div id="employmentTypeField" style="display: none;">
              <label>Employment Type</label>
              <select name="employment_type">
                <option value="" disabled selected>Select Employment Type</option>
                <option value="permanent">Permanent</option>
                <option value="job_hire">Job Hire</option>
                <option value="part_time">Part-time</option>
              </select>
            </div>
          </div>

          <div class="grid-3">
            <div id="yearLevelField">
              <label>Year Level (For Students)</label>
              <select name="yearLevel">
                <option value="" disabled selected>Select Year Level</option>
                <option value="1st">1st Year</option>
                <option value="2nd">2nd Year</option>
                <option value="3rd">3rd Year</option>
                <option value="4th">4th Year</option>
              </select>
            </div>
            <div id="sectionField">
              <label>Section</label>
              <input type="text" name="section" placeholder="Enter your section" />
            </div>
          </div>

          <div class="upload-box">
            <label>Upload Scanned Copy of Driver's License</label>
            <div class="upload-area">
              Drag and drop files here or
              <span class="browse">click to browse</span>
              <input type="file" name="driversLicense" accept="image/*,application/pdf" style="display: none" required />
            </div>
          </div>
        </section>

        <div id="vehicle-sections">
          <section class="vehicle-section">
            <div class="section-header">
              <h3>Vehicle Information</h3>
              <button type="button" class="btn-delete-vehicle">Remove</button>
            </div>

            <div class="grid-3">
              <div>
                <label>Vehicle Type</label>
                <select name="vehicleType[]" required>
                  <option value="" disabled selected>Select Vehicle Type</option>
                  <option value="Car">Car</option>
                  <option value="Motorcycle">Motorcycle</option>
                </select>
              </div>
              <div>
                <label>Manufacturer</label>
                <input type="text" name="manufacturer[]" placeholder="Enter manufacturer" required />
              </div>
              <div>
                <label>Model</label>
                <input type="text" name="model[]" placeholder="Enter model" required />
              </div>
            </div>

            <div class="grid-3">
              <div>
                <label>Color</label>
                <input type="text" name="color[]" placeholder="Enter vehicle color" required />
              </div>
              <div>
                <label>Plate Number</label>
                <input type="text" name="plateNumber[]" placeholder="Enter plate number" required />
              </div>
              <div>
                <label>Number of Wheels</label>
                <select name="numWheels[]" required disabled>
                  <option value="" disabled selected>Select Number of Wheels</option>
                  <option value="2">2 Wheels</option>
                  <option value="4">4 Wheels</option>
                </select>
              </div>
            </div>

            <div class="grid-3">
              <div>
                <label>Fuel Type</label>
                <select name="fuelType[]" required>
                  <option value="" disabled selected>Select Fuel Type</option>
                  <option value="Gasoline">Gasoline</option>
                  <option value="Diesel">Diesel</option>
                  <option value="Electric">Electric</option>
                  <option value="Hybrid">Hybrid</option>
                </select>
              </div>
              <div>
                <label>Cubic Capacity (For Motorcycles)</label>
                <input type="text" name="cubicCapacity[]" placeholder="Enter cubic capacity (cc)" required disabled />
              </div>
            </div>

            <div class="upload-box">
              <label>Upload Scanned Copy of Official Receipt (OR)</label>
              <div class="upload-area">
                Drag and drop files here or
                <span class="browse">click to browse</span>
                <input type="file" name="officialReceipt[]" accept="image/*,application/pdf" style="display: none" required />
              </div>
            </div>

            <div class="upload-box">
              <label>Upload Scanned Copy of Certificate of Registration (CR)</label>
              <div class="upload-area">
                Drag and drop files here or
                <span class="browse">click to browse</span>
                <input type="file" name="certRegistration[]" accept="image/*,application/pdf" style="display: none" required />
              </div>
            </div>
          </section>
        </div>
        <button type="button" class="add-btn" id="addVehicleBtn">+ Add More Vehicle</button>

        <div class="agreement">
          <input type="checkbox" required /> I agree to the university's traffic regulations, security policies, and penalties for violations
        </div>
        <div class="button-row">
          <button type="submit" class="submit-btn">Submit Application</button>
        </div>
      </form>
    </div>

    <!-- Success Popup -->
    <div id="successPopup" class="popup">
      <div class="popup-content">
        <h3>Registration Submitted Successfully!</h3>
        <p>Your application has been received and will be reviewed by an administrator.</p>
        <p>Your temporary ID: <strong id="tempID"></strong></p>
        <button class="popup-btn" onclick="closePopup()">OK</button>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Handle user type change
        const userTypeRadios = document.querySelectorAll('input[name="userType"]');
        
        userTypeRadios.forEach(radio => {
          radio.addEventListener('change', function() {
            const courseField = document.getElementById('courseField');
            const academicYearField = document.getElementById('academicYearField');
            const yearLevelField = document.getElementById('yearLevelField');
            const sectionField = document.getElementById('sectionField');
            
            const employmentTypeField = document.getElementById('employmentTypeField');
            
            if (this.value === 'faculty' || this.value === 'non-teaching') {
              courseField.style.display = 'none';
              academicYearField.style.display = 'none';
              yearLevelField.style.display = 'none';
              sectionField.style.display = 'none';
              employmentTypeField.style.display = 'block';
              
              document.querySelector('input[name="course"]').removeAttribute('required');
              document.querySelector('select[name="academicYear"]').removeAttribute('required');
              document.querySelector('select[name="employment_type"]').setAttribute('required', 'required');
            } else {
              courseField.style.display = 'block';
              academicYearField.style.display = 'block';
              yearLevelField.style.display = 'block';
              sectionField.style.display = 'block';
              employmentTypeField.style.display = 'none';
              
              document.querySelector('input[name="course"]').setAttribute('required', 'required');
              document.querySelector('select[name="academicYear"]').setAttribute('required', 'required');
              document.querySelector('select[name="employment_type"]').removeAttribute('required');
            }
          });
        });
        // Form submission with AJAX
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
          e.preventDefault();
          
          // Validate form
          const requiredFields = this.querySelectorAll('[required]');
          let allValid = true;
          
          requiredFields.forEach(field => {
            if (!field.value) {
              allValid = false;
              field.style.borderColor = 'red';
            } else {
              field.style.borderColor = '';
            }
          });
          
          if (!allValid) {
            alert('Please fill in all required fields');
            return;
          }
          
          // Submit form with AJAX
          const formData = new FormData(this);
          
          // Enable disabled fields before form submission
          const disabledSelects = this.querySelectorAll('select[name="numWheels[]"][disabled]');
          const disabledInputs = this.querySelectorAll('input[name="cubicCapacity[]"][disabled]');
          
          disabledSelects.forEach(select => {
            select.disabled = false;
          });
          disabledInputs.forEach(input => {
            input.disabled = false;
          });
          
          // Re-create FormData to include enabled fields
          const finalFormData = new FormData(this);
          
          // Re-disable the fields
          disabledSelects.forEach(select => {
            select.disabled = true;
          });
          disabledInputs.forEach(input => {
            input.disabled = true;
          });
          
          // Set null values for hidden fields if faculty or non-teaching
          const selectedUserType = document.querySelector('input[name="userType"]:checked')?.value;
          if (selectedUserType === 'faculty' || selectedUserType === 'non-teaching') {
            finalFormData.set('course', '');
            finalFormData.set('academicYear', '');
            finalFormData.set('yearLevel', '');
            finalFormData.set('section', '');
          }
          
          fetch('process_registration.php', {
            method: 'POST',
            body: finalFormData
          })
          .then(response => {
            if (!response.ok) {
              throw new Error('Network response was not ok');
            }
            return response.json();
          })
          .then(data => {
            if (data.success) {
              // Show success popup
              document.getElementById('tempID').textContent = data.tempOwnerID;
              document.getElementById('successPopup').style.display = 'flex';
            } else {
              alert('Error: ' + data.message);
            }
          })
          .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while submitting the form');
          });
        });
        
        // Close popup function
        window.closePopup = function() {
          document.getElementById('successPopup').style.display = 'none';
          location.reload();
        };

        function initUploadArea(area) {
          const fileInput = area.querySelector('input[type="file"]');
          const browse = area.querySelector('.browse');
          
          area.addEventListener('dragover', function(e) {
            e.preventDefault();
            area.classList.add('dragover');
          });
          
          area.addEventListener('dragleave', function(e) {
            area.classList.remove('dragover');
          });
          
          area.addEventListener('drop', function(e) {
            e.preventDefault();
            area.classList.remove('dragover');
            if (e.dataTransfer.files.length) {
              fileInput.files = e.dataTransfer.files;
              showFileName(area, e.dataTransfer.files[0].name);
            }
          });
          
          browse.addEventListener('click', function() {
            fileInput.click();
          });
          
          fileInput.addEventListener('change', function(e) {
            if (e.target.files.length) {
              showFileName(area, e.target.files[0].name);
            }
          });
        }
        
        function showFileName(area, fileName) {
          const existing = area.querySelector('.file-name');
          if (existing) existing.remove();
          
          const fileDiv = document.createElement('div');
          fileDiv.className = 'file-name';
          fileDiv.textContent = 'Selected: ' + fileName;
          fileDiv.style.marginTop = '10px';
          fileDiv.style.fontSize = '12px';
          fileDiv.style.color = '#059669';
          area.appendChild(fileDiv);
        }
        
        document.querySelectorAll('.upload-area').forEach(initUploadArea);
        
        document.getElementById('addVehicleBtn').addEventListener('click', function() {
          const vehicleSections = document.getElementById('vehicle-sections');
          const lastSection = vehicleSections.querySelector('.vehicle-section:last-child');
          const newSection = lastSection.cloneNode(true);
          
          newSection.querySelectorAll('input, select').forEach(function(el) {
            if (el.type === 'file') {
              el.value = '';
            } else if (el.tagName.toLowerCase() === 'select') {
              el.selectedIndex = 0;
            } else {
              el.value = '';
            }
          });
          
          newSection.querySelectorAll('.file-name').forEach(fn => fn.remove());
          vehicleSections.appendChild(newSection);
          newSection.querySelectorAll('.upload-area').forEach(initUploadArea);
          
          // Add delete functionality to the new section
          const deleteBtn = newSection.querySelector('.btn-delete-vehicle');
          if (deleteBtn) {
            deleteBtn.addEventListener('click', handleDeleteVehicle);
          }
          
          // Add vehicle type change listener to new section
          const vehicleTypeSelect = newSection.querySelector('select[name="vehicleType[]"]');
          if (vehicleTypeSelect) {
            vehicleTypeSelect.addEventListener('change', function() {
              handleVehicleTypeChange(this);
            });
          }
          
          // Show all delete buttons when adding a new section
          updateDeleteButtonVisibility();
        });
        
        // Handle delete vehicle functionality
        function handleDeleteVehicle() {
          const vehicleSections = document.getElementById('vehicle-sections');
          const sections = vehicleSections.querySelectorAll('.vehicle-section');
          
          // Don't delete if it's the only section
          if (sections.length <= 1) {
            return;
          }
          
          // Confirm deletion
          if (confirm('Are you sure you want to remove this vehicle?')) {
            const section = this.closest('.vehicle-section');
            section.classList.add('removing');
            
            setTimeout(() => {
              section.remove();
              
              // Check if only one section remains and hide delete buttons if so
              const remainingSections = vehicleSections.querySelectorAll('.vehicle-section');
              if (remainingSections.length <= 1) {
                const deleteButtons = document.querySelectorAll('.btn-delete-vehicle');
                deleteButtons.forEach(btn => btn.style.display = 'none');
              }
            }, 300);
          }
        }
        
        // Add delete functionality to existing buttons
        document.querySelectorAll('.btn-delete-vehicle').forEach(btn => {
          btn.addEventListener('click', handleDeleteVehicle);
        });
        
        // Hide delete buttons if only one vehicle section exists
        function updateDeleteButtonVisibility() {
          const vehicleSections = document.getElementById('vehicle-sections');
          const sections = vehicleSections.querySelectorAll('.vehicle-section');
          const deleteButtons = document.querySelectorAll('.btn-delete-vehicle');
          
          if (sections.length <= 1) {
            deleteButtons.forEach(btn => btn.style.display = 'none');
          } else {
            deleteButtons.forEach(btn => btn.style.display = 'block');
          }
        }
        
        // Check button visibility on page load
        updateDeleteButtonVisibility();
        
        // Auto-complete number of wheels and handle cubic capacity based on vehicle type
        function handleVehicleTypeChange(selectElement) {
          const vehicleSection = selectElement.closest('.vehicle-section');
          const numWheelsSelect = vehicleSection.querySelector('select[name="numWheels[]"]');
          const cubicCapacityInput = vehicleSection.querySelector('input[name="cubicCapacity[]"]');
          
          if (selectElement.value === 'Car') {
            numWheelsSelect.value = '4';
            numWheelsSelect.disabled = true;
            cubicCapacityInput.disabled = true;
            cubicCapacityInput.readOnly = true;
            cubicCapacityInput.removeAttribute('required');
            cubicCapacityInput.value = 'N/A';
            cubicCapacityInput.style.backgroundColor = '#f5f5f5';
            cubicCapacityInput.style.color = '#666';
          } else if (selectElement.value === 'Motorcycle') {
            numWheelsSelect.value = '2';
            numWheelsSelect.disabled = true;
            cubicCapacityInput.disabled = false;
            cubicCapacityInput.readOnly = false;
            cubicCapacityInput.setAttribute('required', 'required');
            cubicCapacityInput.value = '';
            cubicCapacityInput.style.backgroundColor = '';
            cubicCapacityInput.style.color = '';
          }
        }
        
        // Add event listeners to existing vehicle type selects
        document.querySelectorAll('select[name="vehicleType[]"]').forEach(select => {
          select.addEventListener('change', function() {
            handleVehicleTypeChange(this);
          });
        });
      });
    </script>
  </body>
</html>