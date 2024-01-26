<?php
require_once 'app/config/DbConnection.php';

class StatisticModel
{
    private $user_ip;
    private $visit_time;
    private $page_url;
    private $user_agent;
    private $referer_url;
    private $db;

    public function __construct()
    {
        $this->db = new DBConnection();
    }

    public function getUserIP()
    {
        return $this->user_ip;
    }

    public function setUserIP($user_ip)
    {
        $this->user_ip = $user_ip;
    }

    public function getVisitTime()
    {
        return $this->visit_time;
    }

    public function setVisitTime($visit_time)
    {
        $this->visit_time = $visit_time;
    }

    public function getPageURL()
    {
        return $this->page_url;
    }

    public function setPageURL($page_url)
    {
        $this->page_url = $page_url;
    }

    public function getUserAgent()
    {
        return $this->user_agent;
    }

    public function setUserAgent($user_agent)
    {
        $this->user_agent = $user_agent;
    }

    public function getRefererURL()
    {
        return $this->referer_url;
    }

    public function setRefererURL($referer_url)
    {
        $this->referer_url = $referer_url;
    }


    public function logUserAccess()
    {
        $connection = $this->db->getConnection();
        $query = "INSERT INTO user_access_log (user_ip, visit_time, page_url, user_agent, referer_url) VALUES (?, ?, ?, ?, ?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->user_ip);
        $staement->bindParam(2, $this->visit_time);
        $staement->bindParam(3, $this->page_url);
        $staement->bindParam(4, $this->user_agent);
        $staement->bindParam(5, $this->referer_url);
        try {
            $staement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    // realtime user count
    public function getRealtimeUserCount(): int
    {
        $connection = $this->db->getConnection();
        $query = "SELECT COUNT(DISTINCT user_ip) AS user_count FROM user_access_log WHERE visit_time >= DATE_SUB(NOW(), INTERVAL 5 MINUTE)";
        $statement = $connection->prepare($query);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result['user_count'];
        } catch (PDOException $e) {
            // Handle the exception here
            return false;
        }
    }

    // total visit count today
    public function getTotalVisitCountToday(): int
    {
        $connection = $this->db->getConnection();
        $query = "SELECT COUNT(*) AS visit_count FROM user_access_log WHERE visit_time >= CURDATE()";
        $statement = $connection->prepare($query);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result['visit_count'];
        } catch (PDOException $e) {
            // Handle the exception here
            return false;
        }
    }

    // total visit count
    public function getTotalVisitCount(): int
    {
        $connection = $this->db->getConnection();
        $query = "SELECT COUNT(*) AS visit_count FROM user_access_log";
        $statement = $connection->prepare($query);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result['visit_count'];
        } catch (PDOException $e) {
            // Handle the exception here
            return false;
        }
    }
    // get data for chartjs line chart for 24h visit count
    public function getVisitCount24h(): array
    {
        $connection = $this->db->getConnection();
        $query = "SELECT HOUR(visit_time) AS hour, COUNT(*) AS visit_count FROM user_access_log WHERE visit_time >= DATE_SUB(NOW(), INTERVAL 1 DAY) GROUP BY HOUR(visit_time)";
        $statement = $connection->prepare($query);
        try {
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Initialize an array with 24 elements all set to 0
            $visitCounts = array_fill(0, 24, 0);

            // Fill the visitCounts array with the actual visit counts
            foreach ($result as $row) {
                $visitCounts[intval($row['hour'])] = intval($row['visit_count']);
            }

            return $visitCounts;
        } catch (PDOException $e) {
            // Handle the exception here
            return [];
        }
    }
    // get visit count 12 month
    public function getVisitCount12Month(): array
    {
        $connection = $this->db->getConnection();
        $query = "SELECT MONTH(visit_time) AS month, COUNT(*) AS visit_count FROM user_access_log WHERE visit_time >= DATE_SUB(NOW(), INTERVAL 12 MONTH) GROUP BY MONTH(visit_time)";
        $statement = $connection->prepare($query);
        try {
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Initialize an array with 12 elements all set to 0
            $visitCounts = array_fill(0, 12, 0);

            // Fill the visitCounts array with the actual visit counts
            foreach ($result as $row) {
                $visitCounts[intval($row['month']) - 1] = intval($row['visit_count']);
            }

            return $visitCounts;
        } catch (PDOException $e) {
            // Handle the exception here
            return [];
        }
    }



    // get total voucher expired
    // voucherId;voucherName;quantity;expressAt;expiresAt;orderConditions;conditionsOfUse;categoryId;createdAt;updatedAt;is_trend;supplierId;status;address_target;discountType;maximumDiscount;is_inWallet
    // VOUCHER0012;Giảm 60K;30;2024-01-25;2024-02-28;Áp dụng cho bộ nồi đun nấu;Chỉ áp dụng khi mua trên 1.000.000 VNĐ;5;2024-01-04 00:00:00;2024-01-08 00:00:00;0;4;0;321 Đường MNO, Hải Phòng;2;250.000 VNĐ;0
    public function getTotalVoucherExpired(): int
    {
        $connection = $this->db->getConnection();
        $query = "SELECT COUNT(*) AS voucher_count FROM voucher WHERE expiresAt < NOW()";
        $statement = $connection->prepare($query);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result['voucher_count'];
        } catch (PDOException $e) {
            // Handle the exception here
            return false;
        }
    }
    // get total product in db
    public function getTotalProduct(): int
    {
        $connection = $this->db->getConnection();
        $query = "SELECT COUNT(*) AS product_count FROM product";
        $statement = $connection->prepare($query);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result['product_count'];
        } catch (PDOException $e) {
            // Handle the exception here
            return false;
        }
    }
    // get total post in db
    public function getTotalPost(): int
    {
        $connection = $this->db->getConnection();
        $query = "SELECT COUNT(*) AS post_count FROM post";
        $statement = $connection->prepare($query);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result['post_count'];
        } catch (PDOException $e) {
            // Handle the exception here
            return false;
        }
    }



    // get today used voucher match path /api/voucher/update-used-count
    public function getTodayUsedVoucher(): int
    {
        $connection = $this->db->getConnection();
        $query = "SELECT COUNT(*) AS used_voucher_count FROM user_access_log WHERE visit_time >= CURDATE() AND page_url = '/api/voucher/update-used-count'";
        $statement = $connection->prepare($query);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result['used_voucher_count'];
        } catch (PDOException $e) {
            // Handle the exception here
            return false;
        }
    }


    // get total used voucher form table used 
    public function getTotalUsedVoucher(): int
    {
        $connection = $this->db->getConnection();
        $query = "SELECT SUM(usedCount) AS total_used_voucher FROM used";
        $statement = $connection->prepare($query);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result['total_used_voucher'];
        } catch (PDOException $e) {
            // Handle the exception here
            return false;
        }
    }
    public function getVoucherExpiredCount(): int
    {
        $connection = $this->db->getConnection();
        $query = "SELECT COUNT(*) AS voucher_expired_count FROM voucher WHERE expiresAt < NOW()";
        $statement = $connection->prepare($query);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return intval($result['voucher_expired_count']);
        } catch (PDOException $e) {
            // Handle the exception here
            return false;
        }
    }
    // get count voucher not expired
    public function getVoucherNotExpiredCount(): int
    {
        $connection = $this->db->getConnection();
        $query = "SELECT COUNT(*) AS voucher_not_expired_count FROM voucher WHERE expiresAt >= NOW()";
        $statement = $connection->prepare($query);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return intval($result['voucher_not_expired_count']);
        } catch (PDOException $e) {
            // Handle the exception here
            return false;
        }
    }


    // get list category name count of post by category
    public function getPostCountByCategory(): array
    {
        $connection = $this->db->getConnection();
        $query = "SELECT COUNT(*) AS post_count, categories_post FROM post GROUP BY categories_post";
        $statement = $connection->prepare($query);
        try {
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            // Handle the exception here
            return [];
        }
    }

    // get total voucher by provider
    public function getVoucherCountByProvider(): array
    {
        $connection = $this->db->getConnection();
        $query = "SELECT COUNT(*) AS voucher_count, supplierId FROM voucher GROUP BY supplierId";
        $statement = $connection->prepare($query);
        try {
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            // Handle the exception here
            return [];
        }
    }
    // get total voucher in table voucher
    public function getTotalVoucher(): int
    {
        $connection = $this->db->getConnection();
        $query = "SELECT COUNT(*) AS total_voucher FROM voucher";
        $statement = $connection->prepare($query);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return intval($result['total_voucher']);
        } catch (PDOException $e) {
            // Handle the exception here
            return false;
        }
    }



}
?>