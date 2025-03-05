<h2 class="text-center mb-4">Get in Touch</h2>
<p class="text-center mb-4">If you have any questions, please feel free to contact us.</p>

<form action="contact.php" method="POST">
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
    </div>

    <div class="mb-3">
        <label for="message" class="form-label">Message:</label>
        <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Send Message</button>
    </div>
</form>
