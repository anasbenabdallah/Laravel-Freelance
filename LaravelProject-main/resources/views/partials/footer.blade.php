<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Page Title</title>
  <style>
    #starRating .star.active {
      color: gold; /* You can adjust the color to your preference */
    }
  </style>
</head>

<body>
  <footer class="footer-area">
    <div class="container">
      <div class="row justify-content-center">

        <!-- "Send a Claim" Section -->
        <div class="col-lg-8 mt-5 text-center">
          <div class="single-post">
            <div class="details">
              <div class="title">
                <h3 class="text-info">Send a Claim</h3>
                <br>
              </div>
              <form action="{{ route('claim.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="claim-mail">Email:</label>
                  <input readonly value={{ auth()->user()->email ?? '' }}  type="email" name="claim_mail" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="claim-title">Title:</label>
                  <input type="text" placeholder="Claim Title" name="claim_title" class="form-control" required>
                  @error('claim_title')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="claim-details">Details:</label>
                  <textarea placeholder="Claim Details!" name="claim_details" class="form-control" rows="4" required></textarea>
                  @error('claim_details')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="ratingInput">Evaluate &nbsp&nbsp  
                  <input type="number" placeholder="#" name="claim_rating" id="ratingInput" style="font-size: 16px; width: 40px; text-align: center; border: 1px solid #ccc; border-radius: 5px; padding: 5px; margin-top: 5px; box-shadow: 0 0 5px rgba(255, 0, 0, 0);" required min="1" max="5">
                    &nbsp&nbsp
                    <span id="starRating">
                      <span class="star" data-rating="1">⭐</span>
                      <span class="star" data-rating="2">⭐</span>
                      <span class="star" data-rating="3">⭐</span>
                      <span class="star" data-rating="4">⭐</span>
                      <span class="star" data-rating="5">⭐</span>
                    </span>
                  </label>
                </div>
                <button type="submit" class="btn btn-info btn-lg">Submit Claim</button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
    &nbsp;&nbsp;&nbsp;Hey, {{ auth()->user()->name ?? '' }} you can check your claims <a href="claim_comment">CLICK HERE</a>

  </footer>

  <script>
    // Get the elements
    const ratingInput = document.getElementById('ratingInput');
    const starRating = document.getElementById('starRating');

    // Attach click event listeners to stars
    starRating.addEventListener('click', function (event) {
      // Check if the clicked element is a star
      if (event.target.classList.contains('star')) {
        // Get the rating from the data attribute
        const rating = event.target.getAttribute('data-rating');

        // Update the input value and star display
        ratingInput.value = rating;
        updateStarDisplay(rating);
      }
    });

    // Function to update star display
    function updateStarDisplay(rating) {
      // Remove active class from all stars
      Array.from(starRating.children).forEach(star => {
        star.classList.remove('active');
      });

      // Add active class to stars up to the selected rating
      for (let i = 1; i <= rating; i++) {
        starRating.querySelector(`[data-rating="${i}"]`).classList.add('active');
      }
    }
  </script>
</body>

</html>
