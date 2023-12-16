import itertools
import hashlib
import time


# User input hashed password to decypher 
hashed_pwd = input("\nEnter hashed password:\n")


# s01 hashes given input
def s01_hash(thing):
    hasher = hashlib.sha1(thing.encode())
    x = hasher.hexdigest()
    return x


def set_a(check):

    # Starts timer
    start_time = time.time()

    num_letters = 0

    # Check to see if password is 1 character long
    for combination in itertools.product('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', repeat=1):
        x = ''.join(combination)
        print(x)
        x = s01_hash(x)
        if x == check:
            key = ''.join(combination)
            print("---------------------\n" + key + "\n------------------------")
            num_letters = 0
            end_time = time.time()
            break

        else:
            for i in range(1000):  # Hash combinations up to 1000 levels
                x = s01_hash(x)
                if x == check:
                    key = ''.join(combination)
                    print("-------------------------------\n", key, "Hashed in: ", i,
                          "\n-------------------------------")
                    num_letters = 0
                    end_time = time.time()
                    break

                else:
                    num_letters = 1

    # Check to see if password is 2 characters long
    if num_letters == 1:
        for combination in itertools.product('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', repeat=2):
            x = ''.join(combination)
            print(x)
            x = s01_hash(x)
            if x == check:
                key = ''.join(combination)
                print("------------------------\n" + key + "\n----------------------")
                num_letters = 0
                end_time = time.time()
                break

            else:
                for i in range(1000):  # Hash combinations up to 1000 levels
                    x = s01_hash(x)
                    if x == check:
                        key = ''.join(combination)
                        print("----------------------\n", key, "Hashed in :", i,
                              "\n-----------------------")
                        num_letters = 0
                        end_time = time.time()
                        break

                    else:
                        num_letters = 2

    # Check to see if password is 3 characters long
    if num_letters == 2:
        for combination in itertools.product('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', repeat=3):
            x = ''.join(combination)
            print(x)
            x = s01_hash(x)
            if x == check:
                key = ''.join(combination)
                print("-----------------------\n" + key + "\n---------------------")
                num_letters = 0
                end_time = time.time()
                break

            else:
                for i in range(1000):  # Hash combinations up to 1000 levels
                    x = s01_hash(x)
                    if x == check:
                        key = ''.join(combination)
                        print("-----------------------\n", key, "Hashed in :", i,
                              "\n----------------------")
                        num_letters = 0
                        end_time = time.time()
                        break

                    else:
                        num_letters = 3

    # Check to see if password is 4 characters long
    if num_letters == 3:
        for combination in itertools.product('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', repeat=4):
            x = ''.join(combination)
            print(x)
            x = s01_hash(x)
            if x == check:
                key = ''.join(combination)
                print("----------------------\n" + key + "\n---------------------")
                num_letters = 0
                end_time = time.time()
                break

            else:
                for i in range(1000):  # Hash combinations up to 1000 levels
                    x = s01_hash(x)
                    if x == check:
                        key = ''.join(combination)
                        print("-----------------------\n", key, "Hashed in :", i,
                              "\n-----------------------")
                        num_letters = 0
                        end_time = time.time()
                        break

                    else:
                        num_letters = 4

    # Check to see if password is 5 characters long
    if num_letters == 4:
        for combination in itertools.product('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', repeat=5):
            x = ''.join(combination)
            print(x)
            x = s01_hash(x)
            if x == check:
                key = ''.join(combination)
                print("-----------------------\n" + key + "\n-----------------------")
                num_letters = 0
                end_time = time.time()
                break

            else:
                for i in range(1000):  # Hash combinations up to 1000 levels
                    x = s01_hash(x)
                    if x == check:
                        key = ''.join(combination)
                        print("------------------------\n", key, "Hashed in :", i,
                              "\n-----------------------")
                        num_letters = 0
                        end_time = time.time()
                        break

                    else:
                        num_letters = 5

    # Check to see if password is 6 characters long
    if num_letters == 5:
        for combination in itertools.product('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', repeat=6):
            x = ''.join(combination)
            print(x)
            x = s01_hash(x)
            if x == check:
                key = ''.join(combination)
                print("---------------------\n" + key + "\n-----------------")
                num_letters = 0
                end_time = time.time()
                break

            else:
                for i in range(1000):  # Hash combinations up to 1000 levels
                    x = s01_hash(x)
                    if x == check:
                        key = ''.join(combination)
                        print("------------------\n", key, "Hashed in :", i,
                              "\n---------------------")
                        num_letters = 0
                        end_time = time.time()
                        break

                    else:
                        num_letters = 0

    # Works out and prints time taken for completion
    overall_secs = end_time - start_time
    overall_mins = overall_secs / 60
    overall_secs = round(overall_secs, 2)
    overall_mins = round(overall_mins, 2)
    print("\n", overall_secs, " Seconds to complete")
    print("\n", overall_mins, " mins to complete")


# Checks to see if code is a valid isbn number
def val_isbn(check):

    # Turn input into an array of digits
    d = [int(digit) for digit in check]

    # Checks if it is a valid code
    if len(d) > 6 or len(d) < 5:
        print("Enter valid 6 digit code")
        val_isbn(check)

    # Checks if valid ISBN num
    else:
        if (1 * d[0] + 2 * d[1] + 3 * d[2] + 4 * d[3] + 5 * d[4] + 6 * d[5]) % 7 == 0:
            return True
        
        else:
            return False


def set_b(check):

    # Starts timer
    start_time = time.time()

    # Checks every combination of length 6
    for combination in itertools.product('0123456789', repeat=6):
        x = ''.join(combination)
        print(x)

        # checks if combination is valid ISBN-6 number
        if val_isbn(x):
            x = s01_hash(x)
            if x == check:
                key = ''.join(combination)
                print("-----------------\n" + key + "\n------------------")
                end_time = time.time()
                break

            else:
                for i in range(1000):  # Hashes combination up to 1000th level
                    x = s01_hash(x)
                    if x == check:
                        key = ''.join(combination)
                        print("----------------------\n", key, "Hashed in :", i,
                              "\n--------------------")
                        end_time = time.time()
                        break

    # Works out and prints time taken for completion
    overall_secs = end_time - start_time
    overall_mins = overall_secs / 60
    overall_secs = round(overall_secs, 2)
    overall_mins = round(overall_mins, 2)
    print("\n", overall_secs, " Seconds to complete")
    print("\n", overall_mins, " mins to complete")


# Creates Valid BCH parity bits focused on input
def val_bch(combo):

    # Define list d
    d = []

    d = [int(digit) for digit in combo]

    # Appends the redundancy digits focused on formulas
    d.append((4 * d[0] + 10 * d[1] + 9 * d[2] + 2 * d[3] + 1 * d[4] + 7 * d[5]) % 11)
    d.append((7 * d[0] + 8 * d[1] + 7 * d[2] + 1 * d[3] + 9 * d[4] + 6 * d[5]) % 11)
    d.append((9 * d[0] + 1 * d[1] + 7 * d[2] + 8 * d[3] + 7 * d[4] + 7 * d[5]) % 11)
    d.append((1 * d[0] + 2 * d[1] + 9 * d[2] + 10 * d[3] + 4 * d[4] + 1 * d[5]) % 11)

    return d


def set_c(check):

    # Starts timer
    start_time = time.time()

    # Checks every combination of length 6
    for combination in itertools.product('0123456789', repeat=6):
        x = ''.join(combination)
        print(x)

        # Creates BCH code from input
        d = val_bch(combination)

        # Checks if numbers are usable (no number is greater than 10)
        for i in d[6:]:
            if i > 9:
                usable = False
                break

            else:
                usable = True

        if usable:
            x = ''.join(map(str, d))
            x = s01_hash(x)
            if x == check:
                key = ''.join(str(d))
                print("----------------------\n" + key + "\n-------------------")
                end_time = time.time()
                break

            else:
                for i in range(1000):  # Hashes combination up to 1000th level
                    x = s01_hash(x)
                    if x == check:
                        key = ''.join(d)
                        print("----------------------\n", key, "Hashed in :", i,
                              "\n---------------------")
                        end_time = time.time()
                        break

    # Works out and prints time taken for completion
    overall_secs = end_time - start_time
    overall_mins = overall_secs / 60
    overall_secs = round(overall_secs, 2)
    overall_mins = round(overall_mins, 2)
    print("\n", overall_secs, " Seconds to complete")
    print("\n", overall_mins, " mins to complete")


set_c(hashed_pwd)