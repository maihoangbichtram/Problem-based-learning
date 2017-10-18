-- Create the new database if it does not exist already
IF NOT EXISTS (
    SELECT name
        FROM sys.databases
        WHERE name = N'start_db'
)
CREATE DATABASE start_db
GO  
-- Create a new table called 'TableName' in schema 'SchemaName'
-- Drop the table if it already exists
IF OBJECT_ID('dbo.Employees', 'U') IS NOT NULL
DROP TABLE dbo.Employees
GO
-- Create the table in the specified schema
CREATE TABLE dbo.Employees
(
    EmployeesId INT NOT NULL PRIMARY KEY, -- primary key column
    Name        [NVARCHAR](50) NOT NULL,
    Gender      [NVARCHAR](50) NOT NULL
    -- specify more columns here
);
GO

-- Insert rows into table 'TableName'
INSERT INTO Employees
   ([EmployeesId],[Name],[Gender])
VALUES
   ( 1, N'Mai', N'F'),
   ( 2, N'George', N'M'),
   ( 3, N'Jake', N'M'),
   ( 4, N'Leena', N'F'),
   ( 5, N'Max', N'M')   
GO  

SELECT COUNT(*) as EmployeeCount FROM dbo.Employees;
-- Query all employee information
SELECT e.EmployeesId, e.Name, e.Gender 
FROM dbo.Employees as e
GO

