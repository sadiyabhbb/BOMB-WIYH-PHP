# অফিসিয়াল PHP + Apache ইমেজ ব্যবহার
FROM php:8.2-apache

# Apache rewrite module চালু করো (যদি প্রয়োজন হয়)
RUN a2enmod rewrite

# অ্যাপের সব ফাইল কন্টেইনারে কপি করো
COPY . /var/www/html/

# যদি কোনো ফাইল/ফোল্ডার পারমিশন দরকার হয়, সেটাও ঠিক করো
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Apache ডিফল্ট পোর্ট এক্সপোজ করো
EXPOSE 80

# Apache ফোরগ্রাউন্ডে চালাও (Render এর জন্য প্রয়োজন)
CMD ["apache2-foreground"]
