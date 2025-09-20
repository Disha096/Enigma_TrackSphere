from flask import Flask, render_template, request, redirect, url_for, session

app = Flask(__name__)
app.secret_key = 'super_secret_key'  # required for session

# Dummy admin credentials
ADMINS = {
    "admin@example.com": "admin123"
}

# Route: Login page
@app.route('/')
def login_page():
    return render_template('login.html')

# Route: Admin login handling
@app.route('/admin-login', methods=['POST'])
def admin_login():
    email = request.form['email']
    password = request.form['password']

    if email in ADMINS and ADMINS[email] == password:
        session['admin'] = email
        return redirect(url_for('admin_dashboard'))
    else:
        return render_template('login.html', error="Invalid email or password")

# Route: Admin Dashboard
@app.route('/admin-dashboard')
def admin_dashboard():
    if 'admin' not in session:
        return redirect(url_for('login_page'))
    return render_template('admin-dashboard.html', admin=session['admin'])

# Route: User Dashboard (for Google login redirect)
@app.route('/user-dashboard')
def user_dashboard():
    # This is just a placeholder since Google login is handled on client side
    return render_template('user-dashboard.html')

# Route: Logout
@app.route('/logout')
def logout():
    session.pop('admin', None)
    return redirect(url_for('login_page'))

if __name__ == '__main__':
    app.run(debug=True)
